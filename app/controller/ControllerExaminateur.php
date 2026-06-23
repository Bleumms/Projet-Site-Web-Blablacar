<!-- ----- debut ControllerExaminateur -->
<?php
require_once '../model/ModelTrajet.php';
require_once '../model/ModelUtilisateur.php';
require_once '../model/ModelReservation.php';

class ControllerExaminateur {

 // affichage des deux superglobales (cookies et session)
 public static function examinateurSuperglobales($args = []) {
  // démonstration d'écriture dans la superglobale $_SESSION (compteur de visites)
  if (!isset($_SESSION['nb_visites_examinateur'])) {
   $_SESSION['nb_visites_examinateur'] = 0;
  }
  $_SESSION['nb_visites_examinateur']++;

  include 'config.php';
  $vue = $root . '/app/view/examinateur/viewSuperglobales.php';
  require ($vue);
 }

 
 public static function examinateurReservations($args = []) {
  $trajetsActifs = ModelTrajet::getAllActifs();
  $passagers = ModelUtilisateur::getByRole('passager');

  $results = array();
  for ($i = 0; $i < 10; $i++) {
   $trajet = $trajetsActifs[array_rand($trajetsActifs)];
   $passager = $passagers[array_rand($passagers)];

   ModelReservation::insert($trajet->getId(), $passager->getId());

   $results[] = sprintf("Nouvelle réservation sur le trajet %s --> %s par %s %s",
     $trajet->getVilleDepart(), $trajet->getVilleArrivee(),
     $passager->getPrenom(), $passager->getNom());
  }

  include 'config.php';
  $vue = $root . '/app/view/examinateur/viewReservations.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerExaminateur -->
