<!-- ----- debut ModelUtilisateur -->

<?php
require_once 'Model.php';

class ModelUtilisateur {
 private $id, $nom, $prenom, $role, $login, $password, $solde;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $role = NULL, $login = NULL, $password = NULL, $solde = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->role = $role;
   $this->login = $login;
   $this->password = $password;
   $this->solde = $solde;
  }
 }

 function setId($id) { $this->id = $id; }
 function setNom($nom) { $this->nom = $nom; }
 function setPrenom($prenom) { $this->prenom = $prenom; }
 function setRole($role) { $this->role = $role; }
 function setLogin($login) { $this->login = $login; }
 function setPassword($password) { $this->password = $password; }
 function setSolde($solde) { $this->solde = $solde; }

 function getId() { return $this->id; }
 function getNom() { return $this->nom; }
 function getPrenom() { return $this->prenom; }
 function getRole() { return $this->role; }
 function getLogin() { return $this->login; }
 function getPassword() { return $this->password; }
 function getSolde() { return $this->solde; }


 // retourne la liste de tous les utilisateurs
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from utilisateur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne un utilisateur à partir de son id
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from utilisateur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne un utilisateur à partir de son login (utile pour l'authentification)
 public static function getByLogin($login) {
  try {
   $database = Model::getInstance();
   $query = "select * from utilisateur where login = :login";
   $statement = $database->prepare($query);
   $statement->execute([
     'login' => $login
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne la liste des utilisateurs d'un rôle donné (conducteur ou passager)
 public static function getByRole($role) {
  try {
   $database = Model::getInstance();
   $query = "select * from utilisateur where role = :role";
   $statement = $database->prepare($query);
   $statement->execute([
     'role' => $role
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // insertion d'un nouvel utilisateur.
 // La clé est gérée par le système (max(id) + 1).
 // Le login est construit à partir du nom et du prénom, le mot de passe vaut 'secret'.
 public static function insert($nom, $prenom, $role, $solde) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from utilisateur";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // construction du login
   $login = strtolower($nom . $prenom);

   // ajout d'un nouveau tuple
   $query = "insert into utilisateur values (:id, :nom, :prenom, :role, :login, :password, :solde)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'role' => $role,
     'login' => $login,
     'password' => 'secret',
     'solde' => $solde
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 // mise à jour du solde d'un utilisateur (utile pour les paiements)
 public static function majSolde($id, $solde) {
  try {
   $database = Model::getInstance();
   $query = "update utilisateur set solde = :solde where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'solde' => $solde,
     'id' => $id
   ]);
   return true;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return false;
  }
 }

}
?>
<!-- ----- fin ModelUtilisateur -->
