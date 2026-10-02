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

        $htmlpage = '<!DOCTYPE html>';
        $htmlpage .= '<html>';
        $htmlpage .= '<head><title>Liste des collections</title></head>';
        $htmlpage .= '<body>';
        $htmlpage .= '<h1>Liste des collections</h1>';
        $htmlpage .= '<ul>';

        foreach ($watchCollections as $watchCollection) {
            $url = $this->generateUrl(
                'watch_collection_show',
                ['id' => $watchCollection->getId()]
                );
            
            $htmlpage .= '<li>';
            $htmlpage .= '<a href="' . $url . '">';
            $htmlpage .= $watchCollection->getDescription();
            $htmlpage .= '</a>';
            $htmlpage .= '</li>';
        }

        $htmlpage .= '</ul>';
        $htmlpage .= '</body>';
        $htmlpage .= '</html>';

        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }
    
    #[Route('/watch/collection/{id}', name: 'watch_collection_show', requirements: ['id' => '\d+'])]
    public function show(ManagerRegistry $doctrine, $id): Response
    {
        $watchCollectionRepo = $doctrine->getRepository(WatchCollection::class);
        $watchCollection = $watchCollectionRepo->find($id);

        if (!$watchCollection) {
            throw $this->createNotFoundException('The watch collection does not exist');
            }

        return $this->render('watch_collection/show.html.twig', [
            'watchCollection' => $watchCollection,
        ]);
    }
}