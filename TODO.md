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

**État :  Terminée**

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

### Données de test

* [x] Installer Doctrine Fixtures
* [x] Créer `AppFixtures.php`
* [x] Ajouter une Collection de test
* [x] Ajouter une Montre de test
* [x] Associer la Montre à la Collection
* [x] Charger les fixtures
* [x] Vérifier les données dans SQLite

**État :  Terminée**

---

## Étape 2 — Pages de consultation

* [ ] Créer les pages de consultation des Collections
* [ ] Créer les pages de consultation des Montres
* [ ] Afficher les données enregistrées dans la base
* [ ] Tester les pages de consultation

**État :  À faire**

---

## Étape 3 — Membres

* [ ] Créer l'entité `Member`
* [ ] Mettre en place les membres
* [ ] Mettre en place l'authentification
* [ ] Associer un membre à sa Collection
* [ ] Tester la gestion des membres

**État :  À faire**

---

## Étape 4 — Vitrines

* [ ] Créer l'entité `Vitrine`
* [ ] Mettre en place les Vitrines
* [ ] Permettre de présenter une sélection de Montres
* [ ] Tester les Vitrines

**État :  À faire**

---

## Étape 5 — Gestion des accès

* [ ] Gérer les accès privés
* [ ] Gérer les accès publics
* [ ] Vérifier les droits d'accès aux différentes fonctionnalités
* [ ] Tester les différents niveaux d'accès

**État :  À faire**

---

## Étape 6 — Administration

* [ ] Mettre en place le back-office
* [ ] Gérer les données depuis l'administration
* [ ] Tester les fonctionnalités d'administration

**État :  À faire**

---

## Documentation et Git

* [x] Documenter les étapes réalisées dans le `README.md`
* [x] Mettre à jour le `TODO.md` après chaque étape importante
* [ ] Effectuer un commit Git après chaque étape importante
* [ ] Vérifier l'historique Git du projet
