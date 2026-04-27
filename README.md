# CoachFootManager

CoachFootManager est une application web que j’ai développée avec Symfony dans le but de gérer une équipe de football.

L’idée était de créer un outil simple mais complet pour un entraîneur, afin de suivre ses joueurs, ses équipes, ses entraînements, ses matchs et aussi le matériel et les sanctions.

---

## Ce que permet l’application

On peut gérer les joueurs :
- ajouter, modifier et supprimer un joueur
- renseigner ses informations (nom, prénom, date de naissance, poste, médecin, etc.)
- voir s’il est suspendu
- consulter l’historique de ses cartons

On peut gérer les équipes :
- créer des équipes
- associer des joueurs à une équipe

On peut gérer les cartons :
- ajouter des cartons jaunes ou rouges
- voir l’historique des sanctions
- relier un carton à un match

On peut gérer les matchs (rencontres) :
- enregistrer un match avec une date, un adversaire, un lieu
- ajouter les scores et un résumé

On peut gérer les entraînements :
- planifier des séances avec date, heure et lieu
- associer un entraînement à une équipe

On peut gérer le matériel :
- suivre les quantités
- définir un seuil d’alerte

Il y a aussi un tableau de bord qui affiche des statistiques globales (nombre de joueurs, équipes, cartons, joueurs suspendus).

---

## Authentification

L’application contient un système de connexion.
Un entraîneur peut se connecter pour accéder à l’application.

---

## Technologies utilisées

- PHP
- Symfony
- Doctrine
- MySQL
- Twig
- CSS

---

## Installation

Cloner le projet :


git clone https://github.com/ton-username/coachfoot-manager.git

cd coachfoot-manager


Installer les dépendances :


composer install


Configurer la base de données dans le fichier `.env`.

Puis exécuter :


php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate


Lancer le serveur :


symfony server:start


---

## Objectif du projet

Ce projet m’a permis de pratiquer Symfony sur une application complète avec plusieurs entités liées entre elles.

J’ai voulu faire quelque chose de concret, proche d’un vrai besoin métier, et pas seulement un projet technique.

---

## Améliorations possibles

- ajouter une recherche de joueurs
- ajouter des filtres (par équipe, par statut)
- mettre en place des alertes (ex : matériel faible)
- ajouter un calendrier des entraînements

---

## Auteur

Vanessa Biamonti
