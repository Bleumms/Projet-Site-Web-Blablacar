<!-- ----- debut ControllerVille -->
<?php
require_once '../model/ModelVille.php';

class ControllerVille {

 // --- A6 : liste de toutes les villes
 public static function villeReadAll($args = []) {
  $results = ModelVille::getAll();
  include 'config.php';
  $vue = $root . '/app/view/ville/viewAll.php';
  require ($vue);
 }

 // --- A7 : affiche le formulaire de création d'une ville
 public static function villeCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInsert.php';
  require ($vue);
 }

 // --- A7 : traitement du formulaire de création d'une ville
 public static function villeCreated($args = []) {
  $results = ModelVille::insert(htmlspecialchars($_GET['nom']));
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInserted.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerVille -->
