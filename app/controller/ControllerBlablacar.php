<!-- ----- debut ControllerBlablacar -->
<?php

class ControllerBlablacar {

 
 public static function accueil($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/viewAccueil.php';
  if (DEBUG)
   echo ("ControllerBlablacar : accueil : vue = $vue");
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerBlablacar -->
