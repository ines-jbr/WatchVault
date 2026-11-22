# WatchVault

## Présentation du projet

WatchVault est une application web développée avec Symfony permettant aux passionnés de montres de gérer leurs collections et de présenter une sélection de leurs montres dans des vitrines publiques ou privées.

Chaque membre dispose d'un espace personnel dans lequel il peut consulter sa collection, gérer ses montres et créer ses vitrines.

L'application intègre un système d'authentification et de contrôle d'accès afin de protéger les données et les opérations réservées aux propriétaires.

## Technologies utilisées

- **Framework :** Symfony 7.4 LTS
- **Langage :** PHP
- **Base de données :** SQLite
- **ORM :** Doctrine
- **Templates :** Twig
- **Interface :** Bootstrap
- **Authentification :** Symfony Security
- **Gestion des images :** VichUploaderBundle
- **Données de test :** Doctrine Fixtures
- **Gestion de versions :** Git et GitHub

## Fonctionnalités principales

### 1. Gestion des membres

- Authentification par adresse e-mail et mot de passe.
- Connexion et déconnexion.
- Accès à un espace personnel.
- Affichage des informations du membre connecté.
- Protection des pages personnelles.

### 2. Gestion des collections

- Consultation des collections.
- Consultation des montres appartenant à une collection.
- Association d'une collection à un membre.
- Création de montres dans la collection du membre connecté.
- Vérification du propriétaire avant toute modification.

### 3. Gestion des montres

- Création d'une montre.
- Consultation des montres.
- Modification des informations.
- Suppression d'une montre.
- Association à une collection.
- Téléversement et affichage des images.
- Protection des opérations de modification et de suppression.

### 4. Gestion des vitrines

- Création d'une vitrine.
- Modification et suppression.
- Association d'une vitrine à son créateur.
- Sélection de plusieurs montres.
- Filtrage des montres selon la collection du propriétaire.
- Publication ou dépublication d'une vitrine.
- Consultation publique des vitrines publiées.
- Consultation des vitrines privées par leur propriétaire.

### 5. Sécurité

- Authentification avec Symfony Security.
- Utilisation du rôle `ROLE_USER`.
- Vérification du membre connecté.
- Contrôle des droits sur les collections.
- Contrôle des droits sur les montres.
- Contrôle des droits sur les vitrines.
- Protection des opérations CRUD.
- Vérification des montres sélectionnées dans une vitrine.
- Affichage conditionnel des boutons selon les autorisations.

## Modèle de données

L'application repose sur quatre entités principales :

**Member**
- Représente un utilisateur.
- Possède une collection.
- Peut créer plusieurs vitrines.

**WatchCollection**
- Représente une collection de montres.
- Est associée à un membre.
- Contient plusieurs montres.

**Montre**
- Représente une montre.
- Appartient à une collection.
- Peut apparaître dans plusieurs vitrines.
- Peut posséder une image.

**Vitrine**
- Représente une sélection de montres.
- Appartient à un membre.
- Peut être publiée ou privée.
- Peut contenir plusieurs montres.

## Installation et exécution

### 1. Installer les dépendances

```bash
composer install
```

### 2. Configurer la base de données

Configurer `DATABASE_URL` dans le fichier `.env` pour utiliser SQLite.

### 3. Exécuter les migrations

```bash
php bin/console doctrine:migrations:migrate
```

### 4. Charger les données de test

```bash
php bin/console doctrine:fixtures:load
```

Attention : cette commande peut remplacer les données existantes de la base de développement.

### 5. Démarrer le serveur

```bash
symfony server:start
```

### 6. Accéder à l'application

Ouvrir l'adresse locale affichée par Symfony.

## Suivi du développement

### Étape 0 — Initialisation du projet

- Création du projet Symfony.
- Configuration de Git et GitHub.
- Installation des dépendances.
- Configuration de l'environnement.

**État : Terminée**

### Étape 1 — Entités et base de données

- Création de `WatchCollection`.
- Création de `Montre`.
- Configuration des relations Doctrine.
- Configuration de SQLite.
- Création et exécution des migrations.

**État : Terminée**

### Étape 2 — Gestion des membres

- Création de l'entité `Member`.
- Configuration de l'identification par e-mail.
- Hachage des mots de passe.
- Association entre les membres et les collections.

**État : Terminée**

### Étape 3 — Fixtures

- Installation de Doctrine Fixtures.
- Création des données de test.
- Association des membres, collections et montres.
- Vérification des données enregistrées.

**État : Terminée**

### Étape 4 — Pages de consultation

- Création des contrôleurs.
- Affichage des collections.
- Affichage des montres.
- Gestion des identifiants inexistants.

**État : Terminée**

### Étape 5 — Twig et navigation

- Création des templates Twig.
- Utilisation de `base.html.twig`.
- Navigation entre collections et montres.
- Utilisation de `path()`.

**État : Terminée**

### Étape 6 — Bootstrap et vitrines

- Intégration de Bootstrap.
- Configuration du menu principal.
- Création de l'entité `Vitrine`.
- Configuration des relations Doctrine.

**État : Terminée**

### Étape 7 — Gestion des accès

Cette étape a été développée progressivement dans les étapes 15 et 16.

- Mise en place de l'authentification.
- Gestion des accès publics et privés.
- Protection des fonctionnalités réservées aux membres.
- Vérification des droits des propriétaires.

**État : Fonctionnalités implémentées**

### Étape 8 — Administration

Le back-office d'administration n'est pas inclus dans le périmètre fonctionnel livré. Il constitue une possibilité d'évolution future.

### Étape 9 — CRUD des vitrines

- Création des pages CRUD.
- Gestion des vitrines.
- Affichage des montres associées.
- Personnalisation des interfaces.

**État : Terminée**

### Étape 10 — Contextualisation des contrôleurs

- Consultation des montres depuis une vitrine.
- Vérification de l'appartenance d'une montre à une vitrine.
- Réorganisation des contrôleurs.

**État : Terminée**

### Étape 11 — CRUD des montres

- Création des pages des membres.
- Gestion des montres.
- Association des montres aux collections.
- Adaptation des redirections.

**État : Terminée**

### Étape 12 — CRUD contextualisé des vitrines

- Création des vitrines depuis l'espace personnel.
- Association automatique au membre.
- Gestion des redirections.
- Filtrage des vitrines publiées.

**État : Terminée**

### Étape 13 — Sélection des montres

- Sélection multiple des montres.
- Utilisation de cases à cocher.
- Configuration des relations ManyToMany.
- Filtrage selon la collection du propriétaire.

**État : Terminée**

### Étape 14 — Gestion des images

- Installation de VichUploaderBundle.
- Configuration du stockage.
- Modification de l'entité `Montre`.
- Téléversement des images.
- Affichage des photos dans les différentes pages.
- Ajout d'images dans les fixtures.

**État : Terminée**

### Étape 15 — Authentification

- Création du formulaire de connexion.
- Configuration de Symfony Security.
- Gestion de la connexion et de la déconnexion.
- Adaptation de la navigation.
- Redirection vers l'espace personnel.

**État : Terminée**

### Étape 16 — Sécurisation des fonctionnalités

- Protection des pages personnelles.
- Vérification du propriétaire des collections.
- Protection des opérations CRUD des montres.
- Protection des opérations CRUD des vitrines.
- Restriction de l'accès aux vitrines privées.
- Vérification des montres sélectionnées.

**État : Implémentée**

### Étape 17 — Contextualisation des interfaces

- Personnalisation de l'espace membre.
- Affichage des vitrines personnelles.
- Affichage du statut de publication.
- Adaptation des boutons selon les autorisations.
- Personnalisation des pages des montres.
- Personnalisation des pages des vitrines.
- Personnalisation des pages des collections.
- Conservation de l'affichage des images.

**État : Implémentée**

### Étape 18 — Vérifications finales

Les vérifications techniques suivantes ont été effectuées :

- Validation de la syntaxe Twig.
- Validation du mapping Doctrine.
- Vérification de la synchronisation de la base SQLite.
- Vérification des routes Symfony.
- Vérification de l'état du dépôt Git.

**État : Vérifications techniques réussies**

## Évolutions possibles

- Développement d'un espace d'administration.
- Ajout de tests automatisés.
- Amélioration des messages flash.
- Amélioration de l'interface utilisateur.

## Conclusion

WatchVault est une application Symfony fonctionnelle permettant la gestion des collections, des montres et des vitrines.

Le projet met en pratique les principales fonctionnalités étudiées dans le cadre du développement web avec Symfony : Doctrine ORM, Twig, formulaires, relations entre entités, authentification, contrôle d'accès et téléversement d'images.