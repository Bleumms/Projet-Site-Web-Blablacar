<!-- ----- debut ControllerVille -->
<?php
require_once '../model/ModelVille.php';

class ControllerVille {

 public static function villeReadAll($args = []) {
  $results = ModelVille::getAll();
  include 'config.php';
  $vue = $root . '/app/view/ville/viewAll.php';
  require ($vue);
 }

 public static function villeCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInsert.php';
  require ($vue);
 }

 public static function villeCreated($args = []) {
  $results = ModelVille::insert(htmlspecialchars($_GET['nom']));
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInserted.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerVille -->
