<!-- ----- debut ModelReservation -->

<?php
require_once 'Model.php';

class ModelReservation {
 private $id, $trajet_id, $passager_id;
 private $date_depart, $heure_depart, $depart, $destination, $conducteur, $vehicule, $immatriculation;

 public function __construct($id = NULL, $trajet_id = NULL, $passager_id = NULL) {
  if (!is_null($id)) {
   $this->id = $id;
   $this->trajet_id = $trajet_id;
   $this->passager_id = $passager_id;
  }
 }

 function setId($id) { $this->id = $id; }
 function setTrajetId($trajet_id) { $this->trajet_id = $trajet_id; }
 function setPassagerId($passager_id) { $this->passager_id = $passager_id; }

 function getId() { return $this->id; }
 function getTrajetId() { return $this->trajet_id; }
 function getPassagerId() { return $this->passager_id; }

 function getDateDepart() { return $this->date_depart; }
 function getHeureDepart() { return $this->heure_depart; }
 function getDepart() { return $this->depart; }
 function getDestination() { return $this->destination; }
 function getConducteur() { return $this->conducteur; }
 function getVehicule() { return $this->vehicule; }
 function getImmatriculation() { return $this->immatriculation; }


 // retourne toutes les reservations d'un passager + infos sur les trajets
 public static function getByPassager($passager_id) {
  try {
   $database = Model::getInstance();
   $query = "select reservation.id, date_depart, heure_depart, "
          . "vd.nom as depart, va.nom as destination, "
          . "concat(c.prenom, ' ', c.nom) as conducteur, "
          . "concat(vehicule.marque, ' ', vehicule.modele) as vehicule, immatriculation "
          . "from reservation, trajet, ville vd, ville va, utilisateur c, vehicule "
          . "where reservation.trajet_id = trajet.id "
          . "and trajet.ville_depart = vd.id and trajet.ville_arrivee = va.id "
          . "and trajet.conducteur_id = c.id and trajet.vehicule_id = vehicule.id "
          . "and reservation.passager_id = :passager_id "
          . "order by date_depart";
   $statement = $database->prepare($query);
   $statement->execute([
     'passager_id' => $passager_id
   ]);
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelReservation");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne  passagers ayant réservé un trajet 
 public static function getPassagersByTrajet($trajet_id) {
  try {
   $database = Model::getInstance();
   $query = "select utilisateur.nom as nom, utilisateur.prenom as prenom "
          . "from reservation, utilisateur "
          . "where reservation.passager_id = utilisateur.id and reservation.trajet_id = :trajet_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'trajet_id' => $trajet_id
   ]);
   return $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 
 public static function insert($trajet_id, $passager_id) {
  try {
   $database = Model::getInstance();

   $query = "select max(id) from reservation";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   $query = "insert into reservation values (:id, :trajet_id, :passager_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'trajet_id' => $trajet_id,
     'passager_id' => $passager_id
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

}
?>
<!-- ----- fin ModelReservation -->
