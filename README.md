# WatchVault

## Présentation

WatchVault est une application web destinée aux collectionneurs de montres.

L'application permettra aux membres de gérer leur collection de montres et de partager certaines montres dans une vitrine publique.

## Nomenclature du projet

| Terme du TP3 | WatchVault |
| ------------ | ---------- |
| [objet]      | Montre     |
| [inventaire] | Collection |
| [galerie]    | Vitrine    |
| [nom-code]   | WatchVault |

## Modèle du domaine

Une **Collection** regroupe des **Montres**.

Une Collection peut contenir zéro, une ou plusieurs Montres.

Chaque Montre appartient obligatoirement à une Collection.

Dans le code, l'entité correspondant à la Collection est nommée **`WatchCollection`**.

Un **Member** est associé à une Collection.

Une **Vitrine** permettra ultérieurement de présenter publiquement une sélection de Montres.

### Relations principales


WatchCollection (1) → (0..n) Montre

Member (1) → (1) WatchCollection

## Modèle de données
WatchCollection
- Entité représentant une collection de montres.
- Propriété description.
Montre
- Entité représentant une montre.
- Propriétés nom et description.
- Association avec WatchCollection.
Member
- Entité représentant un membre.
- Identification par adresse e-mail.
- Mot de passe géré par le système de hachage Symfony.
- Association avec WatchCollection.
Vitrine
- Entité créée avec make:entity.
- Propriété description de type string, non nullable.
- Propriété publiee de type boolean, non nullable.
- Table vitrine créée par la migration Version20261012102646.
- Associations avec Member et Montre à réaliser ultérieurement.
Technologies utilisées
- PHP
- Symfony
- Doctrine ORM
- SQLite
- Twig
- Bootstrap

## Suivi dcommeu développement

Étape 0 — Mise en place du projet
Fonctionnalités / travaux réalisés
- Création du projet Symfony WatchVault
- Configuration de Git
- Configuration du projet Symfony avec --webapp
- Suppression de symfony/ux-turbo
- Chargement du projet dans Eclipse
- Vérification du fonctionnement de l'application avec le serveur Symfony
État : Terminée

Étape 1 — Premières entités et base de données
Fonctionnalités / travaux réalisés
- Création de l'entité WatchCollection représentant une collection de montres
- Création de l'entité Montre
- Ajout de la propriété description à WatchCollection
- Ajout des propriétés nom et description à Montre
- Mise en place de la relation :
WatchCollection (1) → (0..n) Montre

- Une collection peut contenir zéro ou plusieurs montres
- Chaque Montre appartient obligatoirement à une Collection
- Configuration de SQLite comme base de données
- Création de la migration de la base de données
- Mise à jour du schéma de la base de données
- Vérification du mapping Doctrine
- Vérification de la synchronisation entre les entités et la base de données
État : Terminée

Étape 2 — Membres
Fonctionnalités / travaux réalisés
- Création de l'entité Member avec make:user
- Configuration de l'identification par adresse e-mail
- Mise en place du mot de passe avec le système de hachage Symfony
- Association d'un Member avec une WatchCollection
- Mise en place de la relation :
Member (1) → (1) WatchCollection

- Mise à jour du schéma de la base de données
- Vérification du mapping Doctrine
- Vérification de la synchronisation entre les entités et la base de données
État : Terminée

Étape 3 — proj-3 : Fixtures et données de test
Fonctionnalités / travaux réalisés
- Installation de Doctrine Fixtures
- Création du fichier AppFixtures.php
- Création de plusieurs WatchCollection
- Création de plusieurs Montre
- Utilisation de références Doctrine entre les fixtures
- Association des montres à leurs collections
- Ajout d'un Member dans les fixtures
- Association du Member à une WatchCollection
- Hachage du mot de passe avec UserPasswordHasherInterface
- Chargement des fixtures avec succès
- Vérification des données directement dans SQLite
- Vérification du mapping Doctrine
- Vérification de la synchronisation du schéma Doctrine
Données de test
Collections :
- Ma collection de montres
- Mes montres vintage
Montres :
- Rolex Submariner — Montre automatique de plongée
- Omega Speedmaster — Montre chronographe
- Seiko 5 — Montre automatique vintage
- Tissot PRX — Montre suisse classique
Membre :
- Adresse e-mail : ines@example.com
- Mot de passe : haché avec le système de hachage Symfony
État : Terminée

Étape 4 : Premières pages publiques en consultation
Contrôleur WatchCollectionController
- Génération du contrôleur WatchCollectionController avec make:controller
- Vérification des routes avec debug:router
- Vérification des contrôleurs avec debug:router --show-controllers
- Test du contrôleur avec le serveur Symfony
Consultation de la liste des collections
- Création de la route /watch/collection
- Chargement des WatchCollection depuis la base de données avec Doctrine
- Récupération des collections avec le repository Doctrine
- Affichage de la liste des collections
- Génération d'une page HTML de consultation
- Test de l'affichage des collections
Consultation d'une collection
- Création de la route /watch/collection/{id}
- Utilisation de l'identifiant de la collection
- Recherche d'une WatchCollection avec Doctrine
- Affichage des informations de la collection
- Gestion du cas où la collection n'existe pas avec une erreur 404
- Ajout d'une contrainte pour accepter uniquement un identifiant numérique
Navigation entre les pages
- Ajout d'un lien vers chaque collection depuis la liste
- Utilisation de generateUrl() pour générer les liens
- Utilisation de la route watch_collection_show
- Test de la navigation entre la liste des collections et la page d'une collection
Correction du mapping Doctrine
- Correction du type Montre dans WatchCollection
- Correction de l'utilisation de Montre::class
- Vérification du mapping entre WatchCollection et Montre
- Vérification du fonctionnement de la consultation des collections après correction
État : Terminée

Étape 5 — Gabarits Twig et navigation entre les entités
Prise en main des gabarits Twig
- Étude du fonctionnement des gabarits Twig avec le TP5
- Utilisation de base.html.twig
- Utilisation des blocs Twig title et body
- Utilisation de {{ }} pour afficher des valeurs
- Utilisation de {% %} pour les instructions Twig
- Utilisation de path() pour générer les liens
- Utilisation de dump pour inspecter les objets
Gabarit de consultation d'une collection
- Création de templates/watch_collection/show.html.twig
- Utilisation de {% extends 'base.html.twig' %}
- Affichage de l'identifiant de la collection
- Affichage de la description de la collection
- Utilisation de dump sur watchCollection
- Ajout d'un lien de retour vers la liste des collections
- Utilisation de la route watch_collection_list
Modification de WatchCollectionController
- Modification de la méthode show()
- Suppression de la génération manuelle du HTML dans cette méthode
- Utilisation de render()
- Transmission de watchCollection au gabarit Twig
Création de MontreController
- Création du contrôleur MontreController avec make:controller
- Création de la route /montre/{id}
- Utilisation de la route montre_show
- Recherche d'une Montre avec Doctrine
- Gestion du cas où la montre n'existe pas avec une erreur 404
Gabarit de consultation d'une montre
- Création de templates/montre/show.html.twig
- Affichage de l'identifiant de la montre
- Affichage du nom de la montre
- Affichage de la description de la montre
- Utilisation de dump sur montre
Affichage des montres d'une collection
- Utilisation de watchCollection.montres
- Utilisation d'une boucle Twig for
- Affichage des montres appartenant à une collection
- Affichage des noms des montres dans une liste
Navigation collection → montre
- Ajout d'un lien vers chaque montre depuis la page d'une collection
- Utilisation de la route montre_show
- Transmission de l'identifiant de la montre avec path()
- Test de la navigation vers une page individuelle de montre
Navigation montre → collection
- Ajout d'un lien de retour vers la collection depuis la page d'une montre
- Utilisation de montre.watchCollection
- Utilisation de la route watch_collection_show
- Test de la navigation entre une montre et sa collection
État : Terminée

Étape 6 — Thème Bootstrap et vitrines
- Intégration du thème Bootstrap Shop Homepage.
- Configuration du chemin des ressources CSS et JavaScript.
- Installation et configuration de camurphy/bootstrap-menu-bundle.
- Création d'un menu de navigation avec un lien vers les collections.
- Création de l'entité Vitrine.
- Ajout de description et publiee.
- Création et exécution de la migration Version20261012102646.
- Vérification du mapping Doctrine des quatre entités.
État : Partiellement terminée — entité créée, associations et gestion des vitrines à réaliser.

Étape 7 — Gestion des accès
Fonctionnalités prévues
- Gestion des accès privés
- Gestion des accès publics
- Contrôle des fonctionnalités selon le type d'accès
- Vérification des droits d'accès aux différentes fonctionnalités
État : À faire
Étape 8 — Administration
Fonctionnalités prévues
- Mise en place du back-office
- Gestion des données de l'application
- Administration des différents éléments du projet
- Test des fonctionnalités d'administration
État : À faire

