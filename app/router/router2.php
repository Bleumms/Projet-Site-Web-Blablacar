<?php
// ----- debut Router2 -----
// La session doit être démarrée AVANT tout affichage (menus dynamiques, authentification, cookies)
session_start();

require ('../controller/ControllerBlablacar.php');
require ('../controller/ControllerUtilisateur.php');
require ('../controller/ControllerVehicule.php');
require ('../controller/ControllerVille.php');
require ('../controller/ControllerTrajet.php');
require ('../controller/ControllerReservation.php');
require ('../controller/ControllerConnexion.php');
require ('../controller/ControllerExaminateur.php');
require ('../controller/ControllerInnovation.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = isset($param["action"]) ? htmlspecialchars($param["action"]) : "";

// --- $args contient tous les paramètres passés en plus de action
$args = $param;
unset($args["action"]);

// --- Liste des méthodes autorisées
switch ($action) {

 // ----- Administrateur : gestion des utilisateurs
 case "utilisateurReadAll" :
 case "conducteurCreate" :
 case "conducteurCreated" :
 case "passagerCreate" :
 case "passagerCreated" :
  ControllerUtilisateur::$action($args);
  break;

 // ----- Administrateur et conducteur : gestion des véhicules
 case "vehiculeReadAll" :
 case "vehiculeCreate" :
 case "vehiculeCreated" :
 case "vehiculeReadMine" :
  ControllerVehicule::$action($args);
  break;

 // ----- Administrateur : gestion des villes
 case "villeReadAll" :
 case "villeCreate" :
 case "villeCreated" :
  ControllerVille::$action($args);
  break;

 // ----- Conducteur : gestion des trajets
 case "trajetReadMine" :
 case "trajetCreate" :
 case "trajetCreated" :
 case "trajetReadId" :
 case "trajetPassagers" :
 case "trajetClotured" :
  ControllerTrajet::$action($args);
  break;

 // ----- Passager : gestion des réservations
 case "reservationReadMine" :
 case "reservationCreate" :
 case "reservationCreated" :
  ControllerReservation::$action($args);
  break;

 // ----- Connexion / déconnexion
 case "connexionLogin" :
 case "connexionLogged" :
 case "connexionLogout" :
  ControllerConnexion::$action($args);
  break;

 // ----- Examinateur
 case "examinateurSuperglobales" :
 case "examinateurReservations" :
  ControllerExaminateur::$action($args);
  break;

 // ----- Innovations
 case "innovationData" :
 case "innovationMvc" :
  ControllerInnovation::$action($args);
  break;

 // Tache par défaut
 default:
  $action = "accueil";
  ControllerBlablacar::$action($args);
}
?>
