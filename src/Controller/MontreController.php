<?php

namespace App\Controller;

use App\Entity\Member;
use App\Entity\Montre;
use App\Entity\WatchCollection;
use App\Form\MontreType;
use App\Repository\MontreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/montre')]
final class MontreController extends AbstractController
{
    // Liste publique des montres
    #[Route(name: 'app_montre_index', methods: ['GET'])]
    public function index(MontreRepository $montreRepository): Response
    {
        return $this->render('montre/index.html.twig', [
            'montres' => $montreRepository->findAll(),
        ]);
    }

    // Création réservée au propriétaire de la collection
    #[IsGranted('ROLE_USER')]
    #[Route('/new/{id}', name: 'app_montre_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        WatchCollection $watchCollection
    ): Response {
        $this->checkCollectionOwner($watchCollection);

        $montre = new Montre();
        $montre->setWatchCollection($watchCollection);

        $form = $this->createForm(MontreType::class, $montre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($montre);
            $entityManager->flush();

            return $this->redirectToRoute(
                'watch_collection_show',
                ['id' => $watchCollection->getId()],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('montre/new.html.twig', [
            'montre' => $montre,
            'form' => $form,
        ]);
    }

    // Consultation publique d'une montre
    #[Route('/{id}', name: 'app_montre_show', methods: ['GET'])]
    public function show(Montre $montre): Response
    {
        return $this->render('montre/show.html.twig', [
            'montre' => $montre,
        ]);
    }

    // Modification réservée au propriétaire
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}/edit', name: 'app_montre_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Montre $montre,
        EntityManagerInterface $entityManager
    ): Response {
        $this->checkCollectionOwner($montre->getWatchCollection());

        $form = $this->createForm(MontreType::class, $montre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute(
                'watch_collection_show',
                ['id' => $montre->getWatchCollection()->getId()],
                Response::HTTP_SEE_OTHER
            );
        }

        return $this->render('montre/edit.html.twig', [
            'montre' => $montre,
            'form' => $form,
        ]);
    }

    // Suppression réservée au propriétaire
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'app_montre_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Montre $montre,
        EntityManagerInterface $entityManager
    ): Response {
        $this->checkCollectionOwner($montre->getWatchCollection());

        $watchCollectionId = $montre->getWatchCollection()->getId();

        if ($this->isCsrfTokenValid(
            'delete' . $montre->getId(),
            $request->getPayload()->getString('_token')
        )) {
            $entityManager->remove($montre);
            $entityManager->flush();
        }

        return $this->redirectToRoute(
            'watch_collection_show',
            ['id' => $watchCollectionId],
            Response::HTTP_SEE_OTHER
        );
    }

    // Vérification du propriétaire de la collection
    private function checkCollectionOwner(WatchCollection $watchCollection): void
    {
        $member = $this->getUser();

        if (!$member instanceof Member) {
            throw $this->createAccessDeniedException(
                'Vous devez être connecté pour effectuer cette action.'
            );
        }

        $owner = $watchCollection->getMember();

        if ($owner === null || $owner->getId() !== $member->getId()) {
            throw $this->createAccessDeniedException(
                'Vous ne pouvez pas modifier les montres de cette collection.'
            );
        }
    }
}