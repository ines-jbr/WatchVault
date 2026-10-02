<?php

namespace App\Controller;

use App\Entity\Montre;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MontreController extends AbstractController
{
    #[Route('/montre/{id}', name: 'montre_show', requirements: ['id' => '\d+'])]
    public function show(ManagerRegistry $doctrine, $id): Response
    {
        $montreRepo = $doctrine->getRepository(Montre::class);
        $montre = $montreRepo->find($id);

        if (!$montre) {
            throw $this->createNotFoundException('The watch does not exist');
        }

        return $this->render('montre/show.html.twig', [
            'montre' => $montre,
        ]);
    }
}