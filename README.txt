WatchVault — Projet CSC4101
===========================

Auteur : Ines Jabri

1. Présentation du projet
-------------------------
WatchVault est une application web destinée aux collectionneurs de montres.
Elle permet de gérer des collections de montres, de consulter leurs
caractéristiques et de préparer des vitrines présentant une sélection
de montres.

Le projet est développé dans le cadre du cours CSC4101 à Télécom SudParis.

2. Technologies
---------------
- PHP
- Symfony 7.4
- Doctrine ORM
- SQLite
- Twig
- Bootstrap
- Git et GitHub

3. Nomenclature
---------------
- [objet]      : Montre
- [inventaire] : WatchCollection
- [galerie]    : Vitrine
- [créateur]   : Member
- [nom-code]   : WatchVault

4. Modèle de données
--------------------
WatchCollection :
Représente une collection de montres et possède une description.

Montre :
Représente une montre. Elle possède un nom et une description et appartient
à une WatchCollection.

Member :
Représente un membre identifié par son adresse e-mail. Le mot de passe est
géré par le système de hachage Symfony. Un membre est associé à une
WatchCollection et peut posséder plusieurs vitrines.

Vitrine :
Représente une vitrine avec une description et un attribut booléen publiee.
Elle est associée à un membre et peut contenir plusieurs montres. Une même
montre peut être associée à plusieurs vitrines.

Associations configurées :
- WatchCollection — Montre : OneToMany / ManyToOne.
- Member — WatchCollection : OneToOne.
- Member — Vitrine : OneToMany / ManyToOne.
- Vitrine — Montre : ManyToMany.

5. Fonctionnalités réalisées et vérifiées
-----------------------------------------
- Consultation de la liste des collections.
- Consultation d'une collection et de ses montres.
- Consultation d'une montre.
- Navigation entre les pages de consultation.
- Utilisation de gabarits Twig.
- Intégration d'un thème Bootstrap.
- Création de l'entité Vitrine et de ses associations.
- Génération du CRUD de Vitrine avec make:crud.
- Consultation, création et modification des vitrines.
- Affichage des montres associées à une vitrine.
- Formulaires de vitrine personnalisés avec Bootstrap.
- Migration de la relation ManyToMany et de l'association avec Member.
- Validation du mapping et du schéma Doctrine.
- Vérification des routes du CRUD de Vitrine.

Routes principales actuellement vérifiées :
- /watch/collection : liste des collections.
- /watch/collection/{id} : consultation d'une collection.
- /montre/{id} : consultation d'une montre.
- /vitrine : liste des vitrines.
- /vitrine/new : création d'une vitrine.
- /vitrine/{id} : consultation d'une vitrine.
- /vitrine/{id}/edit : modification d'une vitrine.

6. Avancement des parties 9 à 13
--------------------------------
Partie 9 — CRUD des vitrines :
Le CRUD de Vitrine a été généré avec make:crud. Les pages de liste,
consultation, création et modification ont été personnalisées avec Bootstrap.
La page de détail affiche les montres associées. Le schéma Doctrine et les
routes ont été vérifiés. L'exécution des fixtures créant une vitrine et
ses associations reste à vérifier dans un environnement adapté.

Partie 10 — Réorganisation des contrôleurs :
Le nouvel affichage public d'une montre a été déplacé dans VitrineController
et son gabarit se trouve dans templates/vitrine/montreshow.html.twig.
Un nouveau CRUD de Montre a été généré avec make:crud. Les opérations de
liste, création, consultation, modification et suppression ont été testées.
Le lien de consultation depuis l'inventaire utilise le nouveau CRUD.
L'affichage contextualisé utilise les identifiants de la vitrine et de la
montre, MapEntity et un lien de retour vers la vitrine. L'accès est refusé
si la montre n'appartient pas à la vitrine demandée ou si la vitrine n'est
pas publiée.

Partie 11 — Contextualisation de l'accès aux données d'un membre :
À réaliser selon les consignes du TP : création de MemberController,
navigation entre le membre et son inventaire, contextualisation de la
création des montres et adaptation des redirections.

Partie 12 — Contextualisation des vitrines :
À réaliser selon les consignes du TP : affichage des vitrines d'un membre,
contextualisation de leur création, adaptation des redirections et
filtrage des vitrines publiques.

Partie 13 — Association des montres aux vitrines :
Le formulaire de Vitrine propose une sélection multiple de montres.
Il reste à vérifier les options du formulaire et à limiter la sélection
aux montres appartenant au membre propriétaire de la vitrine.

Les restrictions d'accès et les vérifications de propriété doivent être
testées avant de considérer ces fonctionnalités comme terminées.



7. Installation et lancement
----------------------------
Depuis la racine du projet :

1. Installer les dépendances :
   symfony composer install

2. Vérifier les migrations et la configuration de la base de données.

3. Lancer le serveur Symfony :
   symfony server:start

Attention concernant les fixtures :
La commande doctrine:fixtures:load peut supprimer les données existantes
avant de charger les fixtures. Ne l'exécuter qu'après avoir vérifié la
configuration et décidé si les données actuelles doivent être conservées.

8. Dépôt et documentation
-------------------------
Dépôt GitHub :
https://github.com/ines-jbr/WatchVault

README.txt : présentation synthétique du projet.
README.md  : documentation détaillée du développement.
TODO.txt   : suivi des tâches et de l'avancement.
TODO.md    : suivi complémentaire, à vérifier si nécessaire.