<!-- ----- debut ControllerConnexion -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerConnexion {


 public static function connexionLogin($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/connexion/viewLogin.php';
  require ($vue);
 }

 public static function connexionLogged($args = []) {
  $login = htmlspecialchars($_GET['login']);
  $password = htmlspecialchars($_GET['password']);

  $tmp = ModelUtilisateur::getByLogin($login);

  $success = false;
  $connecte = NULL;
  if ($tmp && count($tmp) > 0 && $tmp[0]->getPassword() == $password) {
   $_SESSION['login_id'] = $tmp[0]->getId();
   $connecte = $tmp[0];
   $success = true;
  }

  include 'config.php';
  $vue = $root . '/app/view/connexion/viewLogged.php';
  require ($vue);
 }

 public static function connexionLogout($args = []) {
  $_SESSION['login_id'] = -1;
  include 'config.php';
  $vue = $root . '/app/view/connexion/viewLogout.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerConnexion -->
