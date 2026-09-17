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

Une **Vitrine** permettra ultérieurement de présenter publiquement une sélection de Montres.

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
* Chaque montre appartient obligatoirement à une collection
* Configuration de SQLite comme base de données
* Création et mise à jour du schéma de la base de données
* Vérification du mapping Doctrine
* Installation de Doctrine Fixtures
* Création des données de test
* Chargement des fixtures dans la base de données
* Vérification des données directement dans SQLite

### Données de test actuelles

**Collection :**

* `Ma collection de montres`

**Montre :**

* Nom : `Rolex Submariner`
* Description : `Montre automatique de plongée`

**État : Terminée**

---

## Étape 2 — Pages de consultation

### Fonctionnalités prévues

* Consultation des Collections
* Consultation des Montres
* Mise en place des premières pages permettant de consulter les données

**État : À faire**

---

## Étape 3 — Membres

### Fonctionnalités prévues

* Création de l'entité `Member`
* Gestion des membres
* Mise en place de l'authentification
* Association d'un membre avec sa collection

**État : À faire**

---

## Étape 4 — Vitrines

### Fonctionnalités prévues

* Création de l'entité `Vitrine`
* Présentation publique d'une sélection de montres
* Gestion des vitrines

**État : À faire**

---

## Étape 5 — Gestion des accès

### Fonctionnalités prévues

* Gestion des accès privés
* Gestion des accès publics
* Contrôle des fonctionnalités selon le type d'accès

**État : À faire**

---

## Étape 6 — Administration

### Fonctionnalités prévues

* Mise en place du back-office
* Gestion des données de l'application
* Administration des différents éléments du projet

**État : À faire**

