<!-- ----- debut ModelVehicule -->

<?php
require_once 'Model.php';

class ModelVehicule {
 private $id, $marque, $modele, $annee, $immatriculation, $proprietaire_id, $proprietaire;

 public function __construct($id = NULL, $marque = NULL, $modele = NULL, $annee = NULL, $immatriculation = NULL, $proprietaire_id = NULL) {
  if (!is_null($id)) {
   $this->id = $id;
   $this->marque = $marque;
   $this->modele = $modele;
   $this->annee = $annee;
   $this->immatriculation = $immatriculation;
   $this->proprietaire_id = $proprietaire_id;
  }
 }

 function setId($id) { $this->id = $id; }
 function setMarque($marque) { $this->marque = $marque; }
 function setModele($modele) { $this->modele = $modele; }
 function setAnnee($annee) { $this->annee = $annee; }
 function setImmatriculation($immatriculation) { $this->immatriculation = $immatriculation; }
 function setProprietaireId($proprietaire_id) { $this->proprietaire_id = $proprietaire_id; }

 function getId() { return $this->id; }
 function getMarque() { return $this->marque; }
 function getModele() { return $this->modele; }
 function getAnnee() { return $this->annee; }
 function getImmatriculation() { return $this->immatriculation; }
 function getProprietaireId() { return $this->proprietaire_id; }
 function getProprietaire() { return $this->proprietaire; }


 // retourne la liste de tous les véhicules.
 // Le propriétaire est construit à partir du prénom et du nom (interdit d'afficher les clés).
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select vehicule.id, marque, modele, annee, immatriculation, proprietaire_id, "
          . "concat(utilisateur.prenom, ' ', utilisateur.nom) as proprietaire "
          . "from vehicule, utilisateur "
          . "where vehicule.proprietaire_id = utilisateur.id";
   $statement = $database->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne la liste des véhicules d'un propriétaire (le conducteur connecté)
 public static function getByProprietaire($proprietaire_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vehicule where proprietaire_id = :proprietaire_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'proprietaire_id' => $proprietaire_id
   ]);
   return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // insertion d'un véhicule (la clé = max(id) + 1)
 public static function insert($marque, $modele, $annee, $immatriculation, $proprietaire_id) {
  try {
   $database = Model::getInstance();

   $query = "select max(id) from vehicule";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   $query = "insert into vehicule values (:id, :marque, :modele, :annee, :immatriculation, :proprietaire_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'marque' => $marque,
     'modele' => $modele,
     'annee' => $annee,
     'immatriculation' => $immatriculation,
     'proprietaire_id' => $proprietaire_id
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

}
?>
<!-- ----- fin ModelVehicule -->
