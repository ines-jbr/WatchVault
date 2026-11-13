<?php

namespace App\DataFixtures;

use App\Entity\Vitrine;
use App\Entity\WatchCollection;
use App\Entity\Montre;
use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AppFixtures extends Fixture
{
    private const COLLECTION_PERSONNELLE = 'collection-personnelle';
    private const COLLECTION_VINTAGE = 'collection-vintage';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    // Générateur des collections
    private static function collectionsGenerator(): \Generator
    {
        yield ['Ma collection de montres', self::COLLECTION_PERSONNELLE];
        yield ['Mes montres vintage', self::COLLECTION_VINTAGE];
    }

    // Générateur des montres avec leurs images
    private static function montresGenerator(): \Generator
    {
        yield [
            self::COLLECTION_PERSONNELLE,
            'Rolex Submariner',
            'Montre automatique de plongée',
            'rolex.jpg'
        ];

        yield [
            self::COLLECTION_PERSONNELLE,
            'Omega Speedmaster',
            'Montre chronographe',
            'omega.jpg'
        ];

        yield [
            self::COLLECTION_VINTAGE,
            'Seiko 5',
            'Montre automatique vintage',
            'seiko.jpg'
        ];

        yield [
            self::COLLECTION_VINTAGE,
            'Tissot PRX',
            'Montre suisse classique',
            'tissot.jpg'
        ];
    }

    public function load(ObjectManager $manager): void
    {
        // ========================================
        // 1. Création des collections
        // ========================================

        foreach (self::collectionsGenerator() as [$description, $collectionReference]) {
            $collection = new WatchCollection();
            $collection->setDescription($description);

            $manager->persist($collection);
            $manager->flush();

            $this->addReference($collectionReference, $collection);
        }

        // ========================================
        // 2. Création des montres avec leurs images
        // ========================================

        $montresCreees = [];

        foreach (self::montresGenerator() as [$collectionReference, $nom, $description, $image]) {

            $montre = new Montre();

            $montre->setNom($nom);
            $montre->setDescription($description);

            // Association à la collection
            $collection = $this->getReference(
                $collectionReference,
                WatchCollection::class
            );

            $montre->setWatchCollection($collection);

            // Chemin de l'image source
            $sourcePath = __DIR__ . '/images/' . $image;

            if (!is_file($sourcePath)) {
                throw new \RuntimeException(
                    "Image introuvable : " . $sourcePath
                );
            }

            // Création d'une copie temporaire
            $tempPath = tempnam(
                sys_get_temp_dir(),
                'watchvault_'
            );

            if ($tempPath === false) {
                throw new \RuntimeException(
                    "Impossible de créer un fichier temporaire."
                );
            }

            if (!copy($sourcePath, $tempPath)) {
                unlink($tempPath);

                throw new \RuntimeException(
                    "Impossible de copier l'image : " . $sourcePath
                );
            }

            // Simulation d'un téléversement
            $uploadedFile = new UploadedFile(
                $tempPath,
                $image,
                'image/jpeg',
                null,
                true
            );

            // Association de l'image à la montre
            $montre->setImageFile($uploadedFile);

            $manager->persist($montre);

            $montresCreees[$nom] = $montre;
        }

        // ========================================
        // 3. Création d'un membre
        // ========================================

        $member = new Member();

        $member->setEmail('ines@example.com');

        $hashedPassword = $this->passwordHasher->hashPassword(
            $member,
            'password'
        );

        $member->setPassword($hashedPassword);

        // Association du membre à la collection vintage
        $collectionMembre = $this->getReference(
            self::COLLECTION_VINTAGE,
            WatchCollection::class
        );

        $member->setWatchCollection($collectionMembre);

        $manager->persist($member);

        // Enregistrement des montres et du membre
        $manager->flush();

        // ========================================
        // 4. Création d'une vitrine
        // ========================================

        $vitrine = new Vitrine();

        $vitrine->setDescription(
            'Les montres incontournables de WatchVault'
        );

        $vitrine->setPubliee(true);

        $vitrine->setMember($member);

        // Association des montres à la vitrine
        $vitrine->addMontre(
            $montresCreees['Rolex Submariner']
        );

        $vitrine->addMontre(
            $montresCreees['Omega Speedmaster']
        );

        $manager->persist($vitrine);

        $manager->flush();
    }
}