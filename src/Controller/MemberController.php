<?php

namespace App\Controller;

use App\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class MemberController extends AbstractController
{
    #[Route('/member', name: 'app_member_index', methods: ['GET'])]
    public function index(): Response
    {
        // Récupérer uniquement le membre connecté
        $member = $this->getUser();

        // Rediriger vers son espace personnel
        return $this->redirectToRoute('app_member_show', [
            'id' => $member->getId(),
        ]);
    }

    #[Route('/member/{id}', name: 'app_member_show', methods: ['GET'])]
    public function show(Member $member): Response
    {
        // Vérifier que le membre consulté est le membre connecté
        if ($member->getId() !== $this->getUser()->getId()) {
            throw $this->createAccessDeniedException(
                'Vous ne pouvez pas consulter le profil d’un autre membre.'
            );
        }

        return $this->render('member/show.html.twig', [
            'member' => $member,
        ]);
    }
}