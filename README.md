## Suivi du développement

### Étape 0 — Mise en place du projet

- Création du projet Symfony WatchVault.
- Configuration de Git et du dépôt GitHub.
- Configuration du projet Symfony avec `--webapp`.
- Suppression de `symfony/ux-turbo`.
- Chargement du projet dans Eclipse.
- Vérification du fonctionnement du serveur Symfony.

**État : Terminée**

### Étape 1 — Premières entités et base de données

- Création de l'entité `WatchCollection`.
- Création de l'entité `Montre`.
- Ajout des propriétés nécessaires aux entités.
- Mise en place de la relation entre `WatchCollection` et `Montre`.
- Configuration de SQLite.
- Création et exécution des migrations.
- Vérification du mapping Doctrine et du schéma de la base de données.

**État : Terminée**

### Étape 2 — Membres

- Création de l'entité `Member` avec `make:user`.
- Configuration de l'identification par adresse e-mail.
- Gestion du mot de passe avec le système de hachage Symfony.
- Association d'un membre à une `WatchCollection`.
- Mise à jour et validation du schéma Doctrine.

**État : Terminée**

### Étape 3 — Fixtures et données de test

- Installation de Doctrine Fixtures.
- Création du fichier `AppFixtures.php`.
- Création de collections, de montres et d'un membre de test.
- Association des montres à leurs collections.
- Hachage du mot de passe avec `UserPasswordHasherInterface`.
- Chargement et vérification des fixtures.

**État : Terminée**

### Étape 4 — Premières pages de consultation

- Création de `WatchCollectionController`.
- Consultation de la liste des collections.
- Consultation d'une collection et de ses montres.
- Gestion des identifiants inexistants avec une erreur 404.
- Mise en place de la navigation entre les collections et les montres.

**État : Terminée**

### Étape 5 — Gabarits Twig et navigation

- Utilisation de `base.html.twig`.
- Création des gabarits de consultation des collections et des montres.
- Affichage des montres appartenant à une collection.
- Navigation entre une collection et une montre.
- Utilisation de `path()` pour générer les liens.

**État : Terminée**

### Étape 6 — Bootstrap et vitrines

- Intégration du thème Bootstrap Shop Homepage.
- Configuration des ressources CSS et JavaScript.
- Installation et configuration de `camurphy/bootstrap-menu-bundle`.
- Création de l'entité `Vitrine`.
- Ajout des propriétés `description` et `publiee`.
- Création de la migration initiale de la table `vitrine`.

**État : Terminée**

### Étape 9 — CRUD des vitrines

- Génération du contrôleur CRUD des vitrines.
- Création des pages de création, de consultation, de modification et de suppression.
- Affichage des montres associées à une vitrine.
- Personnalisation des gabarits Twig avec Bootstrap.
- Vérification du fonctionnement des formulaires et des pages.

**État : Terminée**

### Étape 10 — Réorganisation et contextualisation des contrôleurs

- Réorganisation de la consultation des montres dans le contexte des vitrines.
- Génération du CRUD des montres.
- Contextualisation de la consultation d'une montre depuis une vitrine.
- Vérification de la cohérence entre la montre consultée et la vitrine.
- Mise en place du contrôle empêchant de consulter une montre qui n'appartient pas à la vitrine concernée.

**État : Terminée**

### Étape 11 — Contextualisation de l'accès aux données d'un membre

- Création des pages de consultation des membres.
- Affichage des informations du membre et de sa collection.
- Mise en place du CRUD des montres.
- Contextualisation de la création des montres dans la collection concernée.
- Adaptation des redirections après modification et suppression des montres.
- Vérification du fonctionnement des pages et des redirections.

**État : Terminée**

### Étape 12 — Contextualisation du CRUD des vitrines

#### 12.1 — Affichage des vitrines du membre

- Affichage des vitrines associées au membre sur sa page de consultation.
- Affichage d'un message lorsque le membre ne possède aucune vitrine.

**État : Terminée**

#### 12.2 — Contextualisation de la création d'une vitrine

- Création d'une vitrine depuis la page du membre.
- Association automatique de la nouvelle vitrine au membre concerné.
- Suppression des liens de création depuis la liste générale des vitrines.
- Adaptation du formulaire pour ne plus choisir manuellement le membre créateur.

**État : Terminée**

#### 12.3 — Contextualisation des redirections

- Redirection vers la page du créateur après modification d'une vitrine.
- Redirection vers la page du créateur après suppression d'une vitrine.
- Vérification des redirections après les opérations CRUD.

**État : Terminée**

#### 12.4 — Affichage des vitrines publiques

- Filtrage de la liste générale pour afficher uniquement les vitrines publiées.
- Conservation de l'affichage des vitrines du membre sur sa page, même lorsqu'elles ne sont pas publiées.
- Vérification du comportement des vitrines publiques et non publiées.

**État : Terminée**

## Améliorations possibles

- Renforcer les contrôles d'accès et les autorisations selon le membre connecté.
- Ajouter des tests automatisés aux fonctionnalités principales.
- Améliorer la gestion des messages flash après les opérations CRUD.
- Mettre en place un espace d'administration.