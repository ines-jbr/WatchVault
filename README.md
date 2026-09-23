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

```text
WatchCollection (1) → (0..n) Montre

Member (1) → (1) WatchCollection
```

---

# Suivi du développement

## Étape 0 — Mise en place du projet

### Fonctionnalités / travaux réalisés

* Création du projet Symfony `WatchVault`
* Configuration de Git
* Configuration du projet Symfony avec `--webapp`
* Suppression de `symfony/ux-turbo`
* Chargement du projet dans Eclipse
* Vérification du fonctionnement de l'application avec le serveur Symfony

**État : Terminée**

---

## Étape 1 — Premières entités et base de données

### Fonctionnalités / travaux réalisés

* Création de l'entité `WatchCollection` représentant une collection de montres
* Création de l'entité `Montre`
* Ajout de la propriété `description` à `WatchCollection`
* Ajout des propriétés `nom` et `description` à `Montre`
* Mise en place de la relation :

```text
WatchCollection (1) → (0..n) Montre
```

* Une collection peut contenir zéro ou plusieurs montres
* Chaque Montre appartient obligatoirement à une Collection
* Configuration de SQLite comme base de données
* Création de la migration de la base de données
* Mise à jour du schéma de la base de données
* Vérification du mapping Doctrine
* Vérification de la synchronisation entre les entités et la base de données

**État : Terminée**

---

## Étape 2 — Membres

### Fonctionnalités / travaux réalisés

* Création de l'entité `Member` avec `make:user`
* Configuration de l'identification par adresse e-mail
* Mise en place du mot de passe avec le système de hachage Symfony
* Association d'un `Member` avec une `WatchCollection`
* Mise en place de la relation :

```text
Member (1) → (1) WatchCollection
```

* Mise à jour du schéma de la base de données
* Vérification du mapping Doctrine
* Vérification de la synchronisation entre les entités et la base de données

**État : Terminée**

---

## Étape 3 — proj-3 : Fixtures et données de test

### Fonctionnalités / travaux réalisés

* Installation de Doctrine Fixtures
* Création du fichier `AppFixtures.php`
* Création de plusieurs `WatchCollection`
* Création de plusieurs `Montre`
* Utilisation de références Doctrine entre les fixtures
* Association des montres à leurs collections
* Ajout d'un `Member` dans les fixtures
* Association du `Member` à une `WatchCollection`
* Hachage du mot de passe avec `UserPasswordHasherInterface`
* Chargement des fixtures avec succès
* Vérification des données directement dans SQLite
* Vérification du mapping Doctrine
* Vérification de la synchronisation du schéma Doctrine

### Données de test

**Collections :**

* `Ma collection de montres`
* `Mes montres vintage`

**Montres :**

* `Rolex Submariner` — Montre automatique de plongée
* `Omega Speedmaster` — Montre chronographe
* `Seiko 5` — Montre automatique vintage
* `Tissot PRX` — Montre suisse classique

**Membre :**

* Adresse e-mail : `ines@example.com`
* Mot de passe : haché avec le système de hachage Symfony

**État : Terminée**

---

## Étape 4 — proj-4 : Premières pages publiques en consultation

### Contrôleur `WatchCollectionController`

* Génération du contrôleur `WatchCollectionController` avec `make:controller`
* Vérification des routes avec `debug:router`
* Vérification des contrôleurs avec `debug:router --show-controllers`
* Test du contrôleur avec le serveur Symfony

### Consultation de la liste des collections

* Création de la route `/watch/collection`
* Chargement des `WatchCollection` depuis la base de données avec Doctrine
* Récupération des collections avec le repository Doctrine
* Affichage de la liste des collections
* Génération d'une page HTML de consultation
* Test de l'affichage des collections

### Consultation d'une collection

* Création de la route `/watch/collection/{id}`
* Utilisation de l'identifiant de la collection
* Recherche d'une `WatchCollection` avec Doctrine
* Affichage des informations de la collection
* Gestion du cas où la collection n'existe pas avec une erreur 404
* Ajout d'une contrainte pour accepter uniquement un identifiant numérique

### Navigation entre les pages

* Ajout d'un lien vers chaque collection depuis la liste
* Utilisation de `generateUrl()` pour générer les liens
* Utilisation de la route `watch_collection_show`
* Test de la navigation entre la liste des collections et la page d'une collection

### Correction du mapping Doctrine

* Correction du type `Montre` dans `WatchCollection`
* Correction de l'utilisation de `Montre::class`
* Vérification du mapping entre `WatchCollection` et `Montre`
* Vérification du fonctionnement de la consultation des collections après correction

**État : Terminée**

---

## Étape 5 — Vitrines

### Fonctionnalités prévues

* Création de l'entité `Vitrine`
* Mise en place des vitrines
* Présentation publique d'une sélection de montres
* Gestion des vitrines

**État : À faire**

---

## Étape 6 — Gestion des accès

### Fonctionnalités prévues

* Gestion des accès privés
* Gestion des accès publics
* Contrôle des fonctionnalités selon le type d'accès
* Vérification des droits d'accès aux différentes fonctionnalités

**État : À faire**

---

## Étape 7 — Administration

### Fonctionnalités prévues

* Mise en place du back-office
* Gestion des données de l'application
* Administration des différents éléments du projet
* Test des fonctionnalités d'administration

**État : À faire**