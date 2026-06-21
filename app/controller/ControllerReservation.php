<!-- ----- debut ControllerReservation -->
<?php
require_once '../model/ModelReservation.php';
require_once '../model/ModelTrajet.php';

class ControllerReservation {

 // --- P1 : liste des réservations du passager connecté
 public static function reservationReadMine($args = []) {
  $passager_id = $_SESSION['login_id'];
  $results = ModelReservation::getByPassager($passager_id);
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewMine.php';
  require ($vue);
 }

 // --- P2 : affiche le formulaire de sélection d'un trajet actif à réserver
 public static function reservationCreate($args = []) {
  $results = ModelTrajet::getAllActifs();
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewSelect.php';
  require ($vue);
 }

 // --- P2 : traitement de la réservation d'un trajet actif
 public static function reservationCreated($args = []) {
  $trajet_id = htmlspecialchars($_GET['id']);
  $results = ModelReservation::insert($trajet_id, $_SESSION['login_id']);
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewReserved.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerReservation -->
