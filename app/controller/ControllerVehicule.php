<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/ModelVehicule.php';
require_once '../model/ModelUtilisateur.php';

class ControllerVehicule {

 public static function vehiculeReadAll($args = []) {
  $results = ModelVehicule::getAll();
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewAll.php';
  require ($vue);
 }

 public static function vehiculeCreate($args = []) {
  $results = ModelUtilisateur::getByRole('conducteur');
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewInsert.php';
  require ($vue);
 }

 public static function vehiculeCreated($args = []) {
  $results = ModelVehicule::insert(
      htmlspecialchars($_GET['marque']),
      htmlspecialchars($_GET['modele']),
      htmlspecialchars($_GET['annee']),
      htmlspecialchars($_GET['immatriculation']),
      htmlspecialchars($_GET['proprietaire_id'])
  );
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewInserted.php';
  require ($vue);
 }


 public static function vehiculeReadMine($args = []) {
  $proprietaire_id = $_SESSION['login_id'];
  $results = ModelVehicule::getByProprietaire($proprietaire_id);
  // récup du conducteur connecté pour l'afficher dans le titre
  $connecte = ModelUtilisateur::getOne($proprietaire_id)[0];
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewMine.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerVehicule -->
