<?php

namespace App\DataFixtures;

use App\Entity\Vitrine;
use App\Entity\WatchCollection;
use App\Entity\Montre;
use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private const COLLECTION_PERSONNELLE = 'collection-personnelle';
    private const COLLECTION_VINTAGE = 'collection-vintage';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }
    private static function collectionsGenerator(): \Generator
    {
        yield ['Ma collection de montres', self::COLLECTION_PERSONNELLE];
        yield ['Mes montres vintage', self::COLLECTION_VINTAGE];
    }

    private static function montresGenerator(): \Generator
    {
        yield [self::COLLECTION_PERSONNELLE, 'Rolex Submariner', 'Montre automatique de plongée'];
        yield [self::COLLECTION_PERSONNELLE, 'Omega Speedmaster', 'Montre chronographe'];
        yield [self::COLLECTION_VINTAGE, 'Seiko 5', 'Montre automatique vintage'];
        yield [self::COLLECTION_VINTAGE, 'Tissot PRX', 'Montre suisse classique'];
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'une collection
        foreach (self::collectionsGenerator() as [$description, $collectionReference]) {
            $collection = new WatchCollection();
            $collection->setDescription($description);

            $manager->persist($collection);
            $manager->flush();

            $this->addReference($collectionReference, $collection);
        }

        // Création des montres
        $montresCreees = [];

        foreach (self::montresGenerator() as [$collectionReference, $nom, $description]) {
            $montre = new Montre();
            $montre->setNom($nom);
            $montre->setDescription($description);

            $collection = $this->getReference($collectionReference, WatchCollection::class);
            $montre->setWatchCollection($collection);

            $manager->persist($montre);
            $montresCreees[$nom] = $montre;
        }

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

        // Création d'une vitrine
        $vitrine = new Vitrine();
        $vitrine->setDescription('Les montres incontournables de WatchVault');
        $vitrine->setPubliee(true);
        $vitrine->setMember($member);

        // Association de montres à la vitrine
        $vitrine->addMontre($montresCreees['Rolex Submariner']);
        $vitrine->addMontre($montresCreees['Omega Speedmaster']);

        $manager->persist($vitrine);
        $manager->flush();
    }
}