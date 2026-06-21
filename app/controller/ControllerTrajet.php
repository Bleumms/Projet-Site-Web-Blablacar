<!-- ----- debut ControllerTrajet -->
<?php
require_once '../model/ModelTrajet.php';
require_once '../model/ModelVille.php';
require_once '../model/ModelVehicule.php';
require_once '../model/ModelReservation.php';
require_once '../model/ModelUtilisateur.php';

class ControllerTrajet {

 // --- C2 : liste de tous les trajets du conducteur connecté (actifs et passifs)
 public static function trajetReadMine($args = []) {
  $conducteur_id = $_SESSION['login_id'];
  $results = ModelTrajet::getByConducteur($conducteur_id);
  $connecte = ModelUtilisateur::getOne($conducteur_id)[0];
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewMine.php';
  require ($vue);
 }

 // --- C3 : affiche le formulaire de création d'un trajet
 public static function trajetCreate($args = []) {
  $villes = ModelVille::getAll();
  $vehicules = ModelVehicule::getByProprietaire($_SESSION['login_id']);
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewInsert.php';
  require ($vue);
 }

 // --- C3 : traitement du formulaire de création d'un trajet
 public static function trajetCreated($args = []) {
  $results = ModelTrajet::insert(
      htmlspecialchars($_GET['ville_depart']),
      htmlspecialchars($_GET['ville_arrivee']),
      $_SESSION['login_id'],
      htmlspecialchars($_GET['vehicule_id']),
      htmlspecialchars($_GET['prix']),
      htmlspecialchars($_GET['date_depart']),
      htmlspecialchars($_GET['heure_depart'])
  );
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewInserted.php';
  require ($vue);
 }

 // --- C4 / C5 : affiche un formulaire de sélection d'un trajet actif du conducteur.
 // --- $target contient la méthode statique qui traitera le formulaire
 // --- (trajetPassagers pour C4, trajetClotured pour C5).
 public static function trajetReadId($args = []) {
  $results = ModelTrajet::getActifsByConducteur($_SESSION['login_id']);
  $target = $args['target'];
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewId.php';
  require ($vue);
 }

 // --- C4 : liste des passagers ayant réservé l'un de mes trajets actifs
 public static function trajetPassagers($args = []) {
  $trajet_id = $_GET['id'];
  $results = ModelReservation::getPassagersByTrajet($trajet_id);
  $trajet = ModelTrajet::getOne($trajet_id)[0];
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewPassagers.php';
  require ($vue);
 }

 // --- C5 : clôture d'un trajet actif (statut passif + paiements passagers -> conducteur)
 public static function trajetClotured($args = []) {
  $trajet_id = $_GET['id'];
  $results = ModelTrajet::cloturer($trajet_id);
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewClotured.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerTrajet -->
