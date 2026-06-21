<!-- ----- debut ModelGenerique -->

<?php
require_once 'Model.php';

// Modèle générique (innovation MVC) :
// exécute n'importe quelle requête SELECT et retourne, comme dans l'exercice
// "Recolte" du cours, un tableau contenant la liste des noms de colonnes ($cols)
// et la liste des tuples ($datas). Une seule vue générique suffit ensuite à
// afficher le résultat de n'importe quelle requête.
class ModelGenerique {

 public static function executer($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();

   // --- récupération des noms des colonnes de la requête
   $cols = array();
   $nb = $statement->columnCount();
   for ($i = 0; $i < $nb; $i++) {
    $meta = $statement->getColumnMeta($i);
    $cols[] = $meta['name'];
   }

   // --- récupération des tuples
   $datas = $statement->fetchAll(PDO::FETCH_NUM);

   return array($cols, $datas);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin ModelGenerique -->
