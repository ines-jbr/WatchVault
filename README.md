# WatchVault

## Présentation

WatchVault est une application web destinée aux collectionneurs de montres.

L'application permettra aux membres de gérer leur collection de montres et de partager certaines montres dans une vitrine publique.

## Nomenclature du projet

| Terme du TP3 | WatchVault |
|---|---|
| [objet] | Montre |
| [inventaire] | Collection |
| [galerie] | Vitrine |
| [nom-code] | WatchVault |

## Modèle du domaine

Une **Collection** regroupe des **Montres**.

Une Collection peut contenir zéro, une ou plusieurs Montres.

Chaque Montre appartient à une Collection.

Une **Vitrine** permettra ultérieurement de présenter publiquement une sélection de Montres.

## État actuel

- [x] Création du projet Symfony WatchVault
- [x] Configuration de Git
- [x] Configuration du projet Symfony avec `--webapp`
- [x] Suppression de `symfony/ux-turbo`
- [x] Chargement du projet dans Eclipse
- [x] Vérification du fonctionnement de l'application avec le serveur Symfony
- [ ] Création des entités du domaine
- [ ] Mise en place de la relation Collection / Montre
- [ ] Création des pages de consultation
- [ ] Mise en place des Vitrines
- [ ] Gestion des membres et de l'authentification
- [ ] Gestion des accès privés et publics
- [ ] Back-office d'administration
