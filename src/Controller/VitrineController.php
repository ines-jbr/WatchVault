<?php

namespace App\Controller;

use App\Entity\Member;
use App\Entity\Montre;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use App\Entity\Vitrine;
use App\Form\VitrineType;
use App\Repository\VitrineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/vitrine')]
final class VitrineController extends AbstractController
{
    #[Route(name: 'app_vitrine_index', methods: ['GET'])]
    public function index(VitrineRepository $vitrineRepository): Response
    {
        return $this->render('vitrine/index.html.twig', [
            'vitrines' => $vitrineRepository->findBy(['publiee' => true]),
        ]);
    }

    #[Route('/new/{id}', name: 'app_vitrine_new', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function new(
        Member $member,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $vitrine = new Vitrine();
        $vitrine->setMember($member);
        $form = $this->createForm(VitrineType::class, $vitrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vitrine);
            $entityManager->flush();

            return $this->redirectToRoute('app_vitrine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vitrine/new.html.twig', [
            'vitrine' => $vitrine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vitrine_show', methods: ['GET'])]
    public function show(Vitrine $vitrine): Response
    {
        return $this->render('vitrine/show.html.twig', [
            'vitrine' => $vitrine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vitrine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vitrine $vitrine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VitrineType::class, $vitrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute(
                'app_member_show',
                ['id' => $vitrine->getMember()->getId()],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('vitrine/edit.html.twig', [
            'vitrine' => $vitrine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vitrine_delete', methods: ['POST'])]
    public function delete(Request $request, Vitrine $vitrine, EntityManagerInterface $entityManager): Response
    {
        // On récupère le membre avant de supprimer la vitrine.
        $memberId = $vitrine->getMember()->getId();

        if ($this->isCsrfTokenValid('delete'.$vitrine->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($vitrine);
            $entityManager->flush();
        }

        return $this->redirectToRoute(
            'app_member_show',
            ['id' => $memberId],
            Response::HTTP_SEE_OTHER
        );
    }
    #[Route(
        '/{vitrine_id}/montre/{montre_id}',
        name: 'app_vitrine_montre_show',
        requirements: ['vitrine_id' => '\d+', 'montre_id' => '\d+'],
        methods: ['GET']
    )]
    public function montreShow(
        #[MapEntity(id: 'vitrine_id')]
        Vitrine $vitrine,
        #[MapEntity(id: 'montre_id')]
        Montre $montre
    ): Response {
        if (!$vitrine->getMontres()->contains($montre)) {
            throw $this->createNotFoundException(
                "Cette montre n'appartient pas à cette vitrine."
            );
        }

        if (!$vitrine->isPubliee()) {
            throw $this->createAccessDeniedException(
                "Cette vitrine n'est pas publique."
            );
        }

        return $this->render('vitrine/montreshow.html.twig', [
            'montre' => $montre,
            'vitrine' => $vitrine,
        ]);
    }
}
