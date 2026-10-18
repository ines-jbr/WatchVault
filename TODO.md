# TODO - WatchVault

## TP3 — Suivi du développement

---

## Étape 0 — Mise en place du projet

* [x] Créer le projet Symfony `WatchVault`
* [x] Configurer Git
* [x] Configurer Symfony avec `--webapp`
* [x] Supprimer `symfony/ux-turbo`
* [x] Charger le projet dans Eclipse
* [x] Tester le serveur Symfony

**État : Terminée**

---

## Étape 1 — Premières entités et base de données

### Modèle

* [x] Créer l'entité `WatchCollection` (Collection)
* [x] Créer l'entité `Montre`
* [x] Ajouter la description de la Collection
* [x] Ajouter le nom de la Montre
* [x] Ajouter la description de la Montre
* [x] Mettre en place la relation `WatchCollection` → `Montre`
* [x] Vérifier que chaque Montre appartient obligatoirement à une Collection
* [x] Respecter la cardinalité `WatchCollection (1) → (0..n) Montre`

### Base de données

* [x] Configurer SQLite
* [x] Créer / mettre à jour le schéma de la base de données
* [x] Vérifier le mapping Doctrine
* [x] Vérifier que la base de données est synchronisée avec les entités

**État : Terminée**

---

## Étape 2 — Membres

* [x] Créer l'entité `Member` avec `make:user`
* [x] Configurer l'identification par adresse e-mail
* [x] Configurer le mot de passe avec le système de hachage Symfony
* [x] Associer un membre à sa Collection
* [x] Mettre à jour le schéma de la base de données
* [x] Vérifier le mapping Doctrine
* [x] Vérifier la synchronisation entre les entités et la base de données
* [x] Ajouter un membre dans les fixtures
* [x] Hacher le mot de passe dans les fixtures
* [x] Charger les fixtures
* [x] Vérifier le fonctionnement des données

**État : Terminée**

---

## Étape 3 — proj-3 : Fixtures et données de test

* [x] Installer Doctrine Fixtures
* [x] Créer `AppFixtures.php`
* [x] Ajouter plusieurs `WatchCollection`
* [x] Ajouter plusieurs `Montre`
* [x] Utiliser des références entre les fixtures
* [x] Associer les `Montre` aux `WatchCollection`
* [x] Ajouter un `Member` dans les fixtures
* [x] Associer le `Member` à une `WatchCollection`
* [x] Hacher le mot de passe du membre
* [x] Charger les fixtures
* [x] Vérifier les données dans SQLite
* [x] Vérifier le mapping Doctrine

**État : Terminée**

---

## Étape 4 — proj-4 : Premières pages publiques en consultation

### Contrôleur `WatchCollectionController`

* [x] Générer le contrôleur `WatchCollectionController` avec `make:controller`
* [x] Vérifier les routes avec `debug:router`
* [x] Vérifier les contrôleurs avec `debug:router --show-controllers`
* [x] Tester le contrôleur avec le serveur Symfony

### Liste des collections

* [x] Créer la route `/watch/collection`
* [x] Charger les `WatchCollection` avec Doctrine
* [x] Utiliser le repository Doctrine
* [x] Afficher la liste des collections
* [x] Générer une page HTML de consultation
* [x] Tester l'affichage des collections

### Consultation d'une collection

* [x] Créer la route `/watch/collection/{id}`
* [x] Récupérer une `WatchCollection` à partir de son identifiant
* [x] Afficher les informations de la collection
* [x] Gérer le cas d'une collection inexistante avec une erreur 404
* [x] Ajouter une contrainte pour accepter uniquement un identifiant numérique

### Navigation

* [x] Ajouter un lien vers chaque collection depuis la liste
* [x] Utiliser `generateUrl()`
* [x] Utiliser la route `watch_collection_show`
* [x] Tester la navigation entre la liste et la page d'une collection

### Correction Doctrine

* [x] Corriger le type `Montre` dans `WatchCollection`
* [x] Corriger l'utilisation de `Montre::class`
* [x] Vérifier le mapping entre `WatchCollection` et `Montre`
* [x] Vérifier le fonctionnement après correction

**État : Terminée**

---

## Étape 5 — Gabarits Twig et navigation entre les entités

### Prise en main de Twig

* [x] Étudier le fonctionnement des gabarits Twig
* [x] Utiliser `base.html.twig`
* [x] Utiliser les blocs Twig `title` et `body`
* [x] Utiliser `{{ }}` pour afficher des valeurs
* [x] Utiliser `{% %}` pour les instructions Twig
* [x] Utiliser `path()` pour générer les liens
* [x] Utiliser `dump` pour inspecter les objets

### Gabarit de consultation d'une collection

* [x] Créer `templates/watch_collection/show.html.twig`
* [x] Utiliser `{% extends 'base.html.twig' %}`
* [x] Afficher l'identifiant de la collection
* [x] Afficher la description de la collection
* [x] Utiliser `dump` sur `watchCollection`
* [x] Ajouter un lien de retour vers la liste des collections
* [x] Utiliser la route `watch_collection_list`

### Modification de `WatchCollectionController`

* [x] Modifier la méthode `show()`
* [x] Remplacer la génération manuelle du HTML par `render()`
* [x] Transmettre `watchCollection` au gabarit Twig

### Création de `MontreController`

* [x] Créer `MontreController` avec `make:controller`
* [x] Créer la route `/montre/{id}`
* [x] Utiliser la route `montre_show`
* [x] Rechercher une `Montre` avec Doctrine
* [x] Gérer le cas où la montre n'existe pas avec une erreur 404

### Gabarit de consultation d'une montre

* [x] Créer `templates/montre/show.html.twig`
* [x] Afficher l'identifiant de la montre
* [x] Afficher le nom de la montre
* [x] Afficher la description de la montre
* [x] Utiliser `dump` sur `montre`

### Affichage des montres d'une collection

* [x] Utiliser `watchCollection.montres`
* [x] Utiliser une boucle Twig `for`
* [x] Afficher les montres appartenant à une collection
* [x] Afficher les noms des montres dans une liste

### Navigation Collection → Montre

* [x] Ajouter un lien vers chaque montre depuis la page d'une collection
* [x] Utiliser la route `montre_show`
* [x] Transmettre l'identifiant de la montre avec `path()`
* [x] Tester la navigation vers une page individuelle de montre

### Navigation Montre → Collection

* [x] Ajouter un lien de retour vers la collection depuis la page d'une montre
* [x] Utiliser `montre.watchCollection`
* [x] Utiliser la route `watch_collection_show`
* [x] Tester la navigation entre une montre et sa collection

**État : Terminée**

---

## Étape 6 — Thème Bootstrap et vitrines

### Thème et navigation

* [x] Intégrer le thème Bootstrap Shop Homepage
* [x] Configurer le chemin des ressources CSS et JavaScript
* [x] Installer `camurphy/bootstrap-menu-bundle`
* [x] Configurer le menu principal
* [x] Ajouter un lien vers la liste des collections
* [x] Vérifier l'affichage et le fonctionnement des liens

### Entité Vitrine

* [x] Créer l'entité `Vitrine` avec `make:entity`
* [x] Ajouter la propriété `description` de type `string`, non nullable
* [x] Ajouter la propriété `publiee` de type `boolean`, non nullable
* [x] Créer la migration de la table `vitrine`
* [x] Exécuter la migration
* [x] Vérifier le statut des migrations
* [x] Vérifier le mapping Doctrine des quatre entités

### Travaux restant à réaliser

* [x] Associer `Member` à `Vitrine` avec une relation `OneToMany`
* [x] Associer `Vitrine` à `Montre` avec une relation `ManyToMany`
* [x] Mettre en place la gestion des vitrines
* [x] Permettre de présenter publiquement une sélection de montres
* [x] Tester le fonctionnement des vitrines

**État :terminée**

---
---

## Étape 9 — CRUD des vitrines

* [x] Créer les pages de création, consultation, modification et suppression des vitrines
* [x] Afficher les montres associées aux vitrines
* [x] Personnaliser les gabarits Twig avec Bootstrap
* [x] Tester les fonctionnalités CRUD

**État : Terminée**

---

## Étape 10 — Réorganisation et contextualisation des contrôleurs

* [x] Réorganiser la consultation des montres dans le contexte des vitrines
* [x] Créer le CRUD des montres
* [x] Vérifier qu'une montre appartient à la vitrine consultée

**État : Terminée**

---

## Étape 11 — Pages des membres et CRUD contextualisé des montres

* [x] Créer les pages de consultation des membres
* [x] Afficher la collection du membre
* [x] Contextualiser la création des montres dans la collection concernée
* [x] Adapter les redirections après modification et suppression

**État : Terminée**

---

## Étape 12 — CRUD contextualisé des vitrines

* [x] Afficher les vitrines du membre sur sa page
* [x] Créer une vitrine depuis la page du membre
* [x] Associer automatiquement la vitrine au membre concerné
* [x] Supprimer les liens de création depuis la liste générale
* [x] Rediriger vers la page du créateur après modification ou suppression
* [x] Afficher uniquement les vitrines publiées dans la liste générale
* [x] Conserver les vitrines non publiées sur la page de leur créateur
* [x] Tester la création, la modification, la suppression et le filtrage des vitrines

**État : Terminée**

## Étape 13 — Sélection des montres dans une vitrine

* [x] Adapter `VitrineType` pour sélectionner les montres
* [x] Afficher les montres sous forme de cases à cocher
* [x] Autoriser la sélection multiple avec `multiple => true`
* [x] Afficher les choix avec `expanded => true`
* [x] Configurer `by_reference => false`
* [x] Filtrer les montres selon la collection du créateur de la vitrine
* [x] Vérifier les méthodes d'ajout et de suppression des montres dans `Vitrine`
* [x] Vérifier la syntaxe PHP
* [x] Tester la création d'une vitrine avec des montres sélectionnées
* [x] Vérifier l'affichage des montres sélectionnées
* [x] Tester le filtrage avec un autre membre

**État : Terminée**

---

## Étape 7 — Gestion des accès

* [ ] Gérer les accès privés
* [ ] Gérer les accès publics
* [ ] Vérifier les droits d'accès aux différentes fonctionnalités
* [ ] Tester les différents niveaux d'accès

**État : À faire**

---

## Étape 8 — Administration

* [ ] Mettre en place le back-office
* [ ] Gérer les données depuis l'administration
* [ ] Tester les fonctionnalités d'administration

**État : À faire**

---

## Documentation et Git

* [x] Documenter les étapes réalisées dans `README.md`
* [x] Mettre à jour `TODO.md` après chaque étape importante
* [x] Effectuer un commit Git après chaque étape importante
* [x] Vérifier l'historique Git du projet
