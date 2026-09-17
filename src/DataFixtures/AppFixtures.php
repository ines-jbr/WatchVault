<?php

namespace App\DataFixtures;

use App\Entity\WatchCollection;
use App\Entity\Montre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'une collection
        $collection = new WatchCollection();
        $collection->setDescription('Ma collection de montres');

        $manager->persist($collection);

        // Création d'une montre
        $montre = new Montre();
        $montre->setNom('Rolex Submariner');
        $montre->setDescription('Montre automatique de plongée');
        $montre->setWatchCollection($collection);

        $manager->persist($montre);

        $manager->flush();
    }
}