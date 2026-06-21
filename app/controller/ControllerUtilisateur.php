<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerUtilisateur {

 // --- A1 : liste de tous les utilisateurs
 public static function utilisateurReadAll($args = []) {
  $results = ModelUtilisateur::getAll();
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewAll.php';
  require ($vue);
 }

 // --- A2 : affiche le formulaire de création d'un conducteur
 public static function conducteurCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertConducteur.php';
  require ($vue);
 }

 // --- A2 : traitement du formulaire de création d'un conducteur
 public static function conducteurCreated($args = []) {
  $results = ModelUtilisateur::insert(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      'conducteur',
      htmlspecialchars($_GET['solde'])
  );
  $role = 'conducteur';
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInserted.php';
  require ($vue);
 }

 // --- A3 : affiche le formulaire de création d'un passager
 public static function passagerCreate($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertPassager.php';
  require ($vue);
 }

 // --- A3 : traitement du formulaire de création d'un passager
 public static function passagerCreated($args = []) {
  $results = ModelUtilisateur::insert(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      'passager',
      htmlspecialchars($_GET['solde'])
  );
  $role = 'passager';
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInserted.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerUtilisateur -->
