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

## Étape 5 — Vitrines

* [ ] Créer l'entité `Vitrine`
* [ ] Mettre en place les vitrines
* [ ] Permettre de présenter une sélection de Montres
* [ ] Tester les vitrines

**État : À faire**

---

## Étape 6 — Gestion des accès

* [ ] Gérer les accès privés
* [ ] Gérer les accès publics
* [ ] Vérifier les droits d'accès aux différentes fonctionnalités
* [ ] Tester les différents niveaux d'accès

**État : À faire**

---

## Étape 7 — Administration

* [ ] Mettre en place le back-office
* [ ] Gérer les données depuis l'administration
* [ ] Tester les fonctionnalités d'administration

**État : À faire**

---

## Documentation et Git

* [x] Documenter les étapes réalisées dans `README.md`
* [x] Mettre à jour `TODO.md` après chaque étape importante
* [x] Effectuer un commit Git après chaque étape importante
* [ ] Vérifier l'historique Git du projet