<!-- ----- début fragmentTableGenerique -->
<?php
// Vue générique : affiche n'importe quel résultat de requête.
// $cols : tableau des noms de colonnes ; $datas : tableau des tuples.
?>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <?php
      foreach ($cols as $col) {
       echo ("<th scope='col'>" . $col . "</th>");
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($datas as $ligne) {
     echo ("<tr>");
     foreach ($ligne as $valeur) {
      echo ("<td>" . $valeur . "</td>");
     }
     echo ("</tr>");
    }
    ?>
  </tbody>
</table>

<!-- ----- fin fragmentTableGenerique -->
