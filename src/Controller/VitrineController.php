<?php

namespace App\Controller;

use App\Entity\Member;
use App\Entity\Montre;
use App\Entity\Vitrine;
use App\Form\VitrineType;
use App\Repository\VitrineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/vitrine')]
final class VitrineController extends AbstractController
{
    // Liste publique des vitrines publiées
    #[Route(name: 'app_vitrine_index', methods: ['GET'])]
    public function index(VitrineRepository $vitrineRepository): Response
    {
        return $this->render('vitrine/index.html.twig', [
            'vitrines' => $vitrineRepository->findBy(['publiee' => true]),
        ]);
    }

    // Création réservée au membre concerné
    #[IsGranted('ROLE_USER')]
    #[Route('/new/{id}', name: 'app_vitrine_new', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function new(
        Member $member,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $this->checkMemberOwner($member);

        $vitrine = new Vitrine();
        $vitrine->setMember($member);

        $form = $this->createForm(VitrineType::class, $vitrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->checkSelectedMontres($vitrine, $member);

            $entityManager->persist($vitrine);
            $entityManager->flush();

            return $this->redirectToRoute(
                'app_member_show',
                ['id' => $member->getId()],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('vitrine/new.html.twig', [
            'vitrine' => $vitrine,
            'form' => $form,
        ]);
    }

    // Consultation publique ou consultation privée par le propriétaire
    #[Route('/{id}', name: 'app_vitrine_show', methods: ['GET'])]
    public function show(Vitrine $vitrine): Response
    {
        $this->checkVitrineVisibility($vitrine);

        return $this->render('vitrine/show.html.twig', [
            'vitrine' => $vitrine,
        ]);
    }

    // Modification réservée au propriétaire
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}/edit', name: 'app_vitrine_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Vitrine $vitrine,
        EntityManagerInterface $entityManager
    ): Response {
        $this->checkMemberOwner($vitrine->getMember());

        $form = $this->createForm(VitrineType::class, $vitrine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->checkSelectedMontres($vitrine, $vitrine->getMember());

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

    // Suppression réservée au propriétaire
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'app_vitrine_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Vitrine $vitrine,
        EntityManagerInterface $entityManager
    ): Response {
        $this->checkMemberOwner($vitrine->getMember());

        $memberId = $vitrine->getMember()->getId();

        if ($this->isCsrfTokenValid(
            'delete' . $vitrine->getId(),
            $request->getPayload()->getString('_token')
        )) {
            $entityManager->remove($vitrine);
            $entityManager->flush();
        }

        return $this->redirectToRoute(
            'app_member_show',
            ['id' => $memberId],
            Response::HTTP_SEE_OTHER
        );
    }

    // Consultation d'une montre dans une vitrine
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

        $this->checkVitrineVisibility($vitrine);

        return $this->render('vitrine/montreshow.html.twig', [
            'montre' => $montre,
            'vitrine' => $vitrine,
        ]);
    }

    // Vérifier que le membre connecté est le propriétaire
    private function checkMemberOwner(?Member $member): void
    {
        $currentMember = $this->getUser();

        if (
            !$currentMember instanceof Member ||
            $member === null ||
            $member->getId() !== $currentMember->getId()
        ) {
            throw $this->createAccessDeniedException(
                "Vous n'êtes pas autorisé à gérer cette vitrine."
            );
        }
    }

    // Vérifier les droits de consultation d'une vitrine
    private function checkVitrineVisibility(Vitrine $vitrine): void
    {
        if ($vitrine->isPubliee()) {
            return;
        }

        $this->checkMemberOwner($vitrine->getMember());
    }

    // Vérifier que les montres sélectionnées appartiennent au membre
    private function checkSelectedMontres(Vitrine $vitrine, Member $member): void
    {
        $collection = $member->getWatchCollection();

        foreach ($vitrine->getMontres() as $montre) {
            if (
                $collection === null ||
                $montre->getWatchCollection()?->getId() !== $collection->getId()
            ) {
                throw $this->createAccessDeniedException(
                    "Vous ne pouvez pas ajouter une montre d'une autre collection."
                );
            }
        }
    }
}