<!-- ----- debut ControllerReservation -->
<?php
require_once '../model/ModelReservation.php';
require_once '../model/ModelTrajet.php';
require_once '../model/ModelGenerique.php';

class ControllerReservation {

//réservations du passager
 public static function reservationReadMine($args = []) {
  $passager_id = $_SESSION['login_id'];
  $results = ModelReservation::getByPassager($passager_id);

  // recommandation 
  $id = intval($passager_id);
  $q = "select concat(vd.nom, ' -> ', va.nom) as trajet_recommande, "
     . "concat(c.prenom, ' ', c.nom) as conducteur, date_depart, prix "
     . "from trajet t, ville vd, ville va, utilisateur c "
     . "where t.ville_depart = vd.id and t.ville_arrivee = va.id and t.conducteur_id = c.id "
     . "and t.statut = 'actif' "
     . "and exists ( "
     . "  select 1 from reservation r, trajet t2 "
     . "  where r.trajet_id = t2.id and r.passager_id = $id "
     . "  and t2.ville_depart = t.ville_arrivee and t2.ville_arrivee = t.ville_depart "
     . ")";
  $reco = ModelGenerique::executer($q);

  include 'config.php';
  $vue = $root . '/app/view/reservation/viewMine.php';
  require ($vue);
 }

 public static function reservationCreate($args = []) {
  $results = ModelTrajet::getAllActifs();
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewSelect.php';
  require ($vue);
 }

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
