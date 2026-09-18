<?php

namespace App\DataFixtures;

use App\Entity\WatchCollection;
use App\Entity\Montre;
use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

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

        // Création d'un membre
        $member = new Member();
        $member->setEmail('ines@example.com');

        $hashedPassword = $this->passwordHasher->hashPassword(
            $member,
            'password'
        );

        $member->setPassword($hashedPassword);
        $member->setWatchCollection($collection);

        $manager->persist($member);

        $manager->flush();
    }
}