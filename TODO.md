# TODO — WatchVault

## Suivi du développement

**Statut du projet : Fonctionnalités principales développées**

---

## Étape 0 — Initialisation

- [x] Créer le projet Symfony WatchVault
- [x] Configurer Git et GitHub
- [x] Installer les dépendances
- [x] Configurer l'environnement
- [x] Tester le serveur Symfony

**État : Terminée**

---

## Étape 1 — Entités et base de données

- [x] Créer l'entité WatchCollection
- [x] Créer l'entité Montre
- [x] Configurer les relations Doctrine
- [x] Configurer SQLite
- [x] Créer les migrations
- [x] Exécuter les migrations
- [x] Vérifier le schéma de la base de données

**État : Terminée**

---

## Étape 2 — Membres

- [x] Créer l'entité Member
- [x] Configurer l'identification par e-mail
- [x] Configurer le hachage des mots de passe
- [x] Associer les membres aux collections
- [x] Vérifier les relations Doctrine

**État : Terminée**

---

## Étape 3 — Fixtures

- [x] Installer Doctrine Fixtures
- [x] Créer AppFixtures
- [x] Ajouter des membres
- [x] Ajouter des collections
- [x] Ajouter des montres
- [x] Configurer les associations
- [x] Charger les fixtures

**État : Terminée**

---

## Étape 4 — Pages de consultation

- [x] Créer les contrôleurs
- [x] Afficher les collections
- [x] Afficher les montres
- [x] Gérer les erreurs 404
- [x] Tester la navigation

**État : Terminée**

---

## Étape 5 — Twig

- [x] Créer les templates Twig
- [x] Utiliser base.html.twig
- [x] Afficher les données des entités
- [x] Utiliser les boucles Twig
- [x] Utiliser path()
- [x] Configurer la navigation

**État : Terminée**

---

## Étape 6 — Bootstrap et vitrines

- [x] Intégrer Bootstrap
- [x] Configurer le menu principal
- [x] Créer l'entité Vitrine
- [x] Ajouter les propriétés nécessaires
- [x] Configurer les relations Doctrine
- [x] Exécuter les migrations

**État : Terminée**

---

## Étape 7 — Gestion des accès

- [x] Mettre en place l'authentification
- [x] Gérer les accès publics
- [x] Gérer les accès privés
- [x] Protéger les opérations CRUD
- [x] Vérifier les droits du propriétaire

**État : Fonctionnalités implémentées dans les étapes 15 et 16**

---

## Étape 8 — Administration

Le back-office est exclu du périmètre livré et pourra être développé ultérieurement.

---

## Étape 9 — CRUD des vitrines

- [x] Créer une vitrine
- [x] Consulter une vitrine
- [x] Modifier une vitrine
- [x] Supprimer une vitrine
- [x] Afficher les montres associées

**État : Terminée**

---

## Étape 10 — Contextualisation des contrôleurs

- [x] Réorganiser les contrôleurs
- [x] Contextualiser la consultation des montres
- [x] Vérifier l'appartenance d'une montre à une vitrine
- [x] Adapter les routes

**État : Terminée**

---

## Étape 11 — Gestion des montres

- [x] Créer les pages des membres
- [x] Créer le CRUD des montres
- [x] Associer les montres aux collections
- [x] Adapter les redirections
- [x] Vérifier les opérations CRUD

**État : Terminée**

---

## Étape 12 — Gestion contextualisée des vitrines

- [x] Afficher les vitrines du membre
- [x] Créer une vitrine depuis l'espace personnel
- [x] Associer automatiquement la vitrine au membre
- [x] Adapter les redirections
- [x] Filtrer les vitrines publiées
- [x] Afficher les vitrines privées dans l'espace personnel

**État : Terminée**

---

## Étape 13 — Sélection des montres

- [x] Adapter VitrineType
- [x] Ajouter la sélection multiple
- [x] Utiliser expanded et multiple
- [x] Configurer by_reference
- [x] Filtrer les montres selon la collection
- [x] Vérifier les associations ManyToMany

**État : Terminée**

---

## Étape 14 — Gestion des images

- [x] Installer VichUploaderBundle
- [x] Configurer le stockage des images
- [x] Ajouter les propriétés nécessaires à Montre
- [x] Adapter MontreType
- [x] Permettre le téléversement des images
- [x] Afficher les photos des montres
- [x] Afficher les photos dans les vitrines
- [x] Ajouter les images dans les fixtures
- [x] Configurer .gitignore

**État : Terminée**

---

## Étape 15 — Authentification

- [x] Générer le formulaire de connexion
- [x] Configurer security.yaml
- [x] Authentifier les membres par e-mail
- [x] Ajouter la route de connexion
- [x] Ajouter la route de déconnexion
- [x] Rediriger vers l'espace personnel
- [x] Adapter la barre de navigation
- [x] Tester la connexion
- [x] Tester la déconnexion

**État : Terminée**

---

## Étape 16 — Sécurité

- [x] Protéger MemberController
- [x] Protéger les opérations CRUD de MontreController
- [x] Protéger les opérations CRUD de VitrineController
- [x] Vérifier le membre connecté
- [x] Vérifier le propriétaire d'une collection
- [x] Vérifier le propriétaire d'une vitrine
- [x] Restreindre les vitrines privées
- [x] Contrôler les montres sélectionnées
- [x] Vérifier les autorisations dans les contrôleurs

**État : Implémentée**

---

## Étape 17 — Contextualisation

- [x] Personnaliser la page du membre
- [x] Afficher sa collection
- [x] Afficher ses vitrines
- [x] Ajouter les boutons de création
- [x] Afficher le statut des vitrines
- [x] Adapter montre/index.html.twig
- [x] Adapter montre/show.html.twig
- [x] Adapter vitrine/index.html.twig
- [x] Adapter vitrine/show.html.twig
- [x] Adapter watch_collection/show.html.twig
- [x] Afficher les actions selon le propriétaire
- [x] Conserver les images
- [x] Vérifier la syntaxe Twig

**État : Implémentée**

---

## Étape 18 — Vérifications finales

- [x] Vérifier la syntaxe Twig
- [x] Vérifier le mapping Doctrine
- [x] Vérifier la synchronisation de SQLite
- [x] Vérifier les routes Symfony
- [x] Vérifier l'état du dépôt Git
- [x] Préparer la documentation finale

**État : Vérifications techniques réussies**

---

## Évolutions facultatives

Les fonctionnalités suivantes ne font pas partie du périmètre livré :

- Back-office d'administration.
- Tests automatisés supplémentaires.
- Amélioration des messages flash.
- Améliorations graphiques.

---

## Bilan

Les fonctionnalités principales de WatchVault sont développées :

- Gestion des membres.
- Gestion des collections.
- Gestion des montres.
- Gestion des vitrines.
- Authentification.
- Contrôle d'accès.
- Téléversement d'images.
- Contextualisation des interfaces.

**Statut : Développement fonctionnel terminé.**