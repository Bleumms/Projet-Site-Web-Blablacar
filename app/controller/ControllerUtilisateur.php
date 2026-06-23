<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerUtilisateur {

 
 public static function utilisateurReadAll($args = []) {
  $results = ModelUtilisateur::getAll();
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewAll.php';
  require ($vue);
 }

 public static function conducteurCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertConducteur.php';
  require ($vue);
 }

 public static function conducteurCreated($args = []) {
  $results = ModelUtilisateur::insert(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      'conducteur',
      htmlspecialchars($_GET['solde'])
  );
  $role = 'conducteur';
  // on récupère le vrai login généré 
  $login = ($results > 0) ? ModelUtilisateur::getOne($results)[0]->getLogin() : '';
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInserted.php';
  require ($vue);
 }


 public static function passagerCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertPassager.php';
  require ($vue);
 }

 
 public static function passagerCreated($args = []) {
  $results = ModelUtilisateur::insert(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      'passager',
      htmlspecialchars($_GET['solde'])
  );
  $role = 'passager';
  $login = ($results > 0) ? ModelUtilisateur::getOne($results)[0]->getLogin() : '';
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInserted.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerUtilisateur -->
