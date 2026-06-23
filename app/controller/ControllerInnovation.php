<!-- ----- debut ControllerInnovation -->
<?php
require_once '../model/ModelGenerique.php';

class ControllerInnovation {

 public static function innovationData($args = []) {

  // top 10 trajets les plus réservés
  $q1 = "select concat(vd.nom, ' --> ', va.nom) as trajet, count(*) as nb_reservations "
      . "from reservation r, trajet t, ville vd, ville va "
      . "where r.trajet_id = t.id and t.ville_depart = vd.id and t.ville_arrivee = va.id "
      . "group by t.id order by nb_reservations desc limit 10";

  //Trajets actif nayant encore aucune reservation
  $q2 = "select concat(vd.nom, ' --> ', va.nom) as trajet, "
      . "concat(c.prenom, ' ', c.nom) as conducteur, date_depart, prix "
      . "from trajet t, ville vd, ville va, utilisateur c "
      . "where t.ville_depart = vd.id and t.ville_arrivee = va.id and t.conducteur_id = c.id "
      . "and t.statut = 'actif' and t.id not in (select trajet_id from reservation) "
      . "order by date_depart";

 // Villes de départ les plus réservées
  $q3 = "select v.nom as ville_depart, count(*) as nb_reservations "
      . "from reservation r, trajet t, ville v "
      . "where r.trajet_id = t.id and t.ville_depart = v.id "
      . "group by v.id order by nb_reservations desc limit 10";

  // destination les plus réservées
  $q4 = "select va.nom as destination, count(*) as nb_reservations "
      . "from reservation r, trajet t, ville va "
      . "where r.trajet_id = t.id and t.ville_arrivee = va.id "
      . "group by va.id order by nb_reservations desc limit 10";

  $results = array();
  $results[] = array('titre' => 'Top 10 des trajets les plus réservés', 'data' => ModelGenerique::executer($q1));
  $results[] = array('titre' => 'Trajets actifs sans aucune réservation', 'data' => ModelGenerique::executer($q2));
  $results[] = array('titre' => 'Villes de départ les plus réservées', 'data' => ModelGenerique::executer($q3));
  $results[] = array('titre' => 'Destinations les plus réservées', 'data' => ModelGenerique::executer($q4));

  include 'config.php';
  $vue = $root . '/app/view/innovation/viewInnovationData.php';
  require ($vue);
 }


 public static function innovationMvc($args = []) {
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewInnovationMvc.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerInnovation -->
