<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/ModelVehicule.php';
require_once '../model/ModelUtilisateur.php';

class ControllerVehicule {

 // --- A4 : liste de tous les véhicules (propriétaire = prénom + nom, pas de clés)
 public static function vehiculeReadAll($args = []) {
  $results = ModelVehicule::getAll();
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewAll.php';
  require ($vue);
 }

 // --- A5 : affiche le formulaire de création d'un véhicule
 // --- la liste des propriétaires possibles est la liste des conducteurs
 public static function vehiculeCreate($args = []) {
  $results = ModelUtilisateur::getByRole('conducteur');
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewInsert.php';
  require ($vue);
 }

 // --- A5 : traitement du formulaire de création d'un véhicule
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

 // --- C1 : liste des véhicules du conducteur connecté
 public static function vehiculeReadMine($args = []) {
  $proprietaire_id = $_SESSION['login_id'];
  $results = ModelVehicule::getByProprietaire($proprietaire_id);
  // on récupère aussi le conducteur connecté pour l'afficher dans le titre
  $connecte = ModelUtilisateur::getOne($proprietaire_id)[0];
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewMine.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerVehicule -->
