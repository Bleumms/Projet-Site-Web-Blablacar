<!-- ----- debut ControllerInnovation -->
<?php
require_once '../model/ModelGenerique.php';

class ControllerInnovation {

 // --- Innovation DATA : tableau de bord statistique.
 // --- Exploitation originale des données : on croise trajets, réservations,
 // --- villes et utilisateurs pour produire des classements.
 public static function innovationData($args = []) {

  // 1) Top 10 des trajets les plus réservés
  $q1 = "select concat(vd.nom, ' --> ', va.nom) as trajet, count(*) as nb_reservations "
      . "from reservation r, trajet t, ville vd, ville va "
      . "where r.trajet_id = t.id and t.ville_depart = vd.id and t.ville_arrivee = va.id "
      . "group by t.id order by nb_reservations desc limit 10";

  // 2) Villes de départ les plus populaires
  $q2 = "select v.nom as ville_depart, count(*) as nb_trajets "
      . "from trajet t, ville v where t.ville_depart = v.id "
      . "group by v.id order by nb_trajets desc limit 10";

  // 3) Chiffre d'affaires potentiel par conducteur (somme des prix des trajets réservés)
  $q3 = "select concat(c.prenom, ' ', c.nom) as conducteur, "
      . "count(*) as nb_places_vendues, sum(t.prix) as ca_potentiel "
      . "from trajet t, reservation r, utilisateur c "
      . "where r.trajet_id = t.id and t.conducteur_id = c.id "
      . "group by c.id order by ca_potentiel desc";

  $results = array();
  $results[] = array('titre' => 'Top 10 des trajets les plus réservés', 'data' => ModelGenerique::executer($q1));
  $results[] = array('titre' => 'Villes de départ les plus populaires', 'data' => ModelGenerique::executer($q2));
  $results[] = array('titre' => 'Chiffre d\'affaires potentiel par conducteur', 'data' => ModelGenerique::executer($q3));

  include 'config.php';
  $vue = $root . '/app/view/innovation/viewInnovationData.php';
  require ($vue);
 }

 // --- Innovation MVC : présentation du modèle et de la vue génériques.
 // --- On démontre qu'une seule requête + une seule vue suffisent pour tout afficher.
 public static function innovationMvc($args = []) {
  $query = "select t.id as id_trajet, vd.nom as depart, va.nom as arrivee, "
         . "concat(c.prenom, ' ', c.nom) as conducteur, t.prix, t.statut "
         . "from trajet t, ville vd, ville va, utilisateur c "
         . "where t.ville_depart = vd.id and t.ville_arrivee = va.id and t.conducteur_id = c.id "
         . "order by t.id";
  $results = ModelGenerique::executer($query);

  include 'config.php';
  $vue = $root . '/app/view/innovation/viewInnovationMvc.php';
  require ($vue);
 }

}
?>
<!-- ----- fin ControllerInnovation -->
