<?php

namespace App\Controller;

use App\Entity\WatchCollection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WatchCollectionController extends AbstractController
{
    #[Route('/watch/collection', name: 'watch_collection_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $watchCollectionRepo = $doctrine->getRepository(WatchCollection::class);
        $watchCollections = $watchCollectionRepo->findAll();

        return $this->render('watch_collection/index.html.twig', [
            'watchCollections' => $watchCollections,
        ]);
    }

    #[Route(
        '/watch/collection/{id}',
        name: 'watch_collection_show',
        requirements: ['id' => '\d+']
    )]
    public function show(ManagerRegistry $doctrine, $id): Response
    {
        $watchCollectionRepo = $doctrine->getRepository(WatchCollection::class);
        $watchCollection = $watchCollectionRepo->find($id);

        if (!$watchCollection) {
            throw $this->createNotFoundException(
                'The watch collection does not exist'
            );
        }

        return $this->render('watch_collection/show.html.twig', [
            'watchCollection' => $watchCollection,
        ]);
    }
}