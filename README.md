# BlaBlaCar - Projet LO07 (UTT) - 2026

Application web de covoiturage inspirée de BlaBlaCar, réalisée dans le cadre du module **Technologies du Web (LO07)** à l'UTT, encadré par Marc Lemercier.

L'objectif principal est de mettre en pratique l'architecture **MVC (Modèle-Vue-Contrôleur)** sur une application réelle : authentification, gestion des rôles, persistance des données en base MySQL, et déploiement sur un serveur distant.

## Auteurs

- Étudiant 1 : *Emeline Nerot*
- Étudiant 2 : *Magdalena Khiat*
- URL de déploiement : `http://dev-isi.utt.fr/~<login>/lo07_tp/projet/`

## Présentation

L'application permet :

- d'authentifier les utilisateurs (connexion / déconnexion) ;
- de gérer les utilisateurs (administrateurs, conducteurs, passagers) ;
- de gérer les véhicules (ajout, liste) ;
- de gérer les villes (ajout, liste) ;
- de gérer les trajets (création, liste, clôture) ;
- de gérer les réservations de trajets (création, liste).

Une fois connecté, chaque utilisateur n'a accès qu'aux fonctionnalités liées à son rôle :

| Rôle | Périmètre |
|---|---|
| Administrateur | Utilisateurs, véhicules, villes |
| Conducteur | Ses véhicules, ses trajets |
| Passager | Ses réservations, réservation de trajets actifs |

La barre de menu affiche dynamiquement : les noms du binôme, le nom et le solde de l'utilisateur connecté, le menu correspondant à son rôle, ainsi que les menus **Innovations**, **Examinateur** et **Se connecter**.

## Cahier des charges - Fonctionnalités

### Administrateur
- **A1** Liste des utilisateurs
- **A2** Ajout d'un conducteur
- **A3** Ajout d'un passager
- **A4** Liste des véhicules (sans afficher les clés primaires, propriétaire = nom + prénom)
- **A5** Ajout d'un véhicule
- **A6** Liste des villes
- **A7** Ajout d'une ville

### Conducteur
- **C1** Liste de mes véhicules
- **C2** Liste de tous mes trajets (actifs et passifs)
- **C3** Ajout d'un trajet
- **C4** Liste des passagers de l'un de mes trajets actifs
- **C5** Clôturer un trajet actif (passage en statut "passif", paiement des passagers vers le conducteur)

### Passager
- **P1** Liste de mes réservations
- **P2** Réservation d'un trajet actif

### Examinateur
- **E1** Affichage des superglobales (cookies et sessions)
- **E2** Ajout de 10 réservations aléatoires (trajets actifs + passagers aléatoires)

### Connexion
- **F1** Login (formulaire, affichage du menu selon le rôle)
- **F2** Déconnexion (réinitialisation de `$_SESSION['login_id']`)

> Au démarrage de `index.php`, `$_SESSION['login_id']` est réinitialisée : aucun utilisateur n'est connecté par défaut. Sans utilisateur connecté, seuls les menus **Innovations**, **Examinateur** et **Se connecter** sont visibles.

### Innovations proposées
- [ ] Une utilisation originale des données de la base.
- [ ] Une amélioration de la structure/implémentation MVC vue en cours (organisation des contrôleurs, gestion des vues, optimisation des modèles).

## Architecture technique

- **Modèle** : PHP, accès aux données MySQL
- **Vue** : PHP / HTML / Bootstrap
- **Contrôleur** : PHP, routage (router1 ou router2 du cours)
- Respect strict du pattern MVC sur l'ensemble des fonctionnalités

## Base de données

Base fournie : `blablacar2026.sql` (à importer dans MySQL sur `dev-isi.utt.fr`).

| Table | Colonnes |
|---|---|
| `utilisateur` | id, nom, prenom, role, login, password, solde |
| `vehicule` | id, marque, modele, annee, immatriculation, proprietaire_id |
| `ville` | id, nom |
| `trajet` | id, ville_depart, ville_arrivee, conducteur_id, vehicule_id, prix, date_depart, heure_depart, statut |
| `reservation` | id, trajet_id, passager_id |

`role` ∈ {administrateur, conducteur, passager}. `statut` (trajet) ∈ {actif, passif}.

## Structure du projet (proposée)

```
projet/
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
├── config/
│   └── database.php
├── public/
│   ├── index.php
│   └── assets/        (css, js, images Bootstrap)
├── sql/
│   └── blablacar2026.sql
└── README.md
```

## Installation / Déploiement

1. Importer `sql/blablacar2026.sql` dans la base MySQL du serveur `dev-isi.utt.fr`.
2. Renseigner les identifiants de connexion à la base dans `config/database.php`.
3. Déployer le répertoire `projet/` sur `dev-isi.utt.fr` (le projet **doit** y être fonctionnel : c'est la seule version corrigée).

## Documents à rendre (rappel)

- Un fichier ZIP `nom1_nom2.zip` contenant : le code source, le PowerPoint de soutenance (12 min max, sans captures d'écran de l'appli), et un `readme.txt` (noms des deux étudiants + URL du projet).
- Dépôt sur Moodle la veille de la soutenance avant 12h.
- Invitation à transmettre pour la soutenance (Teams/Zoom).
- Date limite de soutenance : **mardi 30 juin 2026**.

## Technologies

- PHP (MVC)
- MySQL
- Bootstrap
