<!-- ----- debut ModelTrajet -->

<?php
require_once 'Model.php';

class ModelTrajet {
 private $id, $ville_depart, $ville_arrivee, $conducteur_id, $vehicule_id, $prix, $date_depart, $heure_depart, $statut;
 // attributs supplémentaires construits par jointure (noms des villes, conducteur, véhicule)
 private $villeDepart, $villeArrivee, $conducteur, $vehicule;

 public function __construct($id = NULL, $ville_depart = NULL, $ville_arrivee = NULL, $conducteur_id = NULL, $vehicule_id = NULL, $prix = NULL, $date_depart = NULL, $heure_depart = NULL, $statut = NULL) {
  if (!is_null($id)) {
   $this->id = $id;
   $this->ville_depart = $ville_depart;
   $this->ville_arrivee = $ville_arrivee;
   $this->conducteur_id = $conducteur_id;
   $this->vehicule_id = $vehicule_id;
   $this->prix = $prix;
   $this->date_depart = $date_depart;
   $this->heure_depart = $heure_depart;
   $this->statut = $statut;
  }
 }

 function setId($id) { $this->id = $id; }
 function setVilleDepart($ville_depart) { $this->ville_depart = $ville_depart; }
 function setVilleArrivee($ville_arrivee) { $this->ville_arrivee = $ville_arrivee; }
 function setConducteurId($conducteur_id) { $this->conducteur_id = $conducteur_id; }
 function setVehiculeId($vehicule_id) { $this->vehicule_id = $vehicule_id; }
 function setPrix($prix) { $this->prix = $prix; }
 function setDateDepart($date_depart) { $this->date_depart = $date_depart; }
 function setHeureDepart($heure_depart) { $this->heure_depart = $heure_depart; }
 function setStatut($statut) { $this->statut = $statut; }

 function getId() { return $this->id; }
 function getVilleDepartId() { return $this->ville_depart; }
 function getVilleArriveeId() { return $this->ville_arrivee; }
 function getConducteurId() { return $this->conducteur_id; }
 function getVehiculeId() { return $this->vehicule_id; }
 function getPrix() { return $this->prix; }
 function getDateDepart() { return $this->date_depart; }
 function getHeureDepart() { return $this->heure_depart; }
 function getStatut() { return $this->statut; }
 // attributs de jointure
 function getVilleDepart() { return $this->villeDepart; }
 function getVilleArrivee() { return $this->villeArrivee; }
 function getConducteur() { return $this->conducteur; }
 function getVehicule() { return $this->vehicule; }


 // retourne tous les trajets (actifs et passifs) d'un conducteur, avec les noms des villes
 public static function getByConducteur($conducteur_id) {
  try {
   $database = Model::getInstance();
   $query = "select trajet.id, vd.nom as villeDepart, va.nom as villeArrivee, prix, date_depart, heure_depart, statut "
          . "from trajet, ville vd, ville va "
          . "where trajet.ville_depart = vd.id and trajet.ville_arrivee = va.id and conducteur_id = :conducteur_id "
          . "order by date_depart";
   $statement = $database->prepare($query);
   $statement->execute([
     'conducteur_id' => $conducteur_id
   ]);
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne les trajets actifs d'un conducteur (sélection pour les passagers / la clôture)
 public static function getActifsByConducteur($conducteur_id) {
  try {
   $database = Model::getInstance();
   $query = "select trajet.id, vd.nom as villeDepart, va.nom as villeArrivee, prix, date_depart, heure_depart, statut "
          . "from trajet, ville vd, ville va "
          . "where trajet.ville_depart = vd.id and trajet.ville_arrivee = va.id "
          . "and conducteur_id = :conducteur_id and statut = 'actif' "
          . "order by date_depart";
   $statement = $database->prepare($query);
   $statement->execute([
     'conducteur_id' => $conducteur_id
   ]);
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne tous les trajets actifs de l'application (réservation par un passager)
 public static function getAllActifs() {
  try {
   $database = Model::getInstance();
   $query = "select trajet.id, vd.nom as villeDepart, va.nom as villeArrivee, "
          . "concat(c.prenom, ' ', c.nom) as conducteur, prix, date_depart, heure_depart, statut "
          . "from trajet, ville vd, ville va, utilisateur c "
          . "where trajet.ville_depart = vd.id and trajet.ville_arrivee = va.id "
          . "and trajet.conducteur_id = c.id and statut = 'actif' "
          . "order by date_depart";
   $statement = $database->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne un trajet à partir de son id
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from trajet where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // insertion d'un nouveau trajet (statut actif par défaut, clé = max(id) + 1)
 public static function insert($ville_depart, $ville_arrivee, $conducteur_id, $vehicule_id, $prix, $date_depart, $heure_depart) {
  try {
   $database = Model::getInstance();

   $query = "select max(id) from trajet";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   $query = "insert into trajet values (:id, :ville_depart, :ville_arrivee, :conducteur_id, :vehicule_id, :prix, :date_depart, :heure_depart, 'actif')";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'ville_depart' => $ville_depart,
     'ville_arrivee' => $ville_arrivee,
     'conducteur_id' => $conducteur_id,
     'vehicule_id' => $vehicule_id,
     'prix' => $prix,
     'date_depart' => $date_depart,
     'heure_depart' => $heure_depart
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 // clôture d'un trajet actif : passage en statut passif puis paiements
 // des comptes des passagers vers le compte du conducteur.
 // Un passager peut avoir réservé plusieurs fois : il paie alors plusieurs fois.
 public static function cloturer($id) {
  try {
   $database = Model::getInstance();

   // récupération du prix, du conducteur et du statut du trajet
   $query = "select prix, conducteur_id, statut from trajet where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $trajet = $statement->fetch(PDO::FETCH_ASSOC);

   // on ne clôture que les trajets actifs
   if (!$trajet || $trajet['statut'] != 'actif') {
    return false;
   }
   $prix = $trajet['prix'];
   $conducteur_id = $trajet['conducteur_id'];

   // passage du trajet en statut passif
   $query = "update trajet set statut = 'passif' where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);

   // liste des passagers ayant réservé ce trajet (doublons possibles)
   $query = "select passager_id from reservation where trajet_id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $passagers = $statement->fetchAll(PDO::FETCH_COLUMN, 0);

   // paiements : chaque réservation débite le passager et crédite le conducteur
   foreach ($passagers as $passager_id) {
    $query = "update utilisateur set solde = solde - :prix where id = :id";
    $statement = $database->prepare($query);
    $statement->execute(['prix' => $prix, 'id' => $passager_id]);

    $query = "update utilisateur set solde = solde + :prix where id = :id";
    $statement = $database->prepare($query);
    $statement->execute(['prix' => $prix, 'id' => $conducteur_id]);
   }
   return true;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return false;
  }
 }

}
?>
<!-- ----- fin ModelTrajet -->
