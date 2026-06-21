<!-- ----- début trajet/viewMine -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Liste de tous les trajets du conducteur <?php echo $connecte->getPrenom() . " " . $connecte->getNom(); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">ville_depart</th>
          <th scope="col">ville_arrivee</th>
          <th scope="col">prix</th>
          <th scope="col">date_depart</th>
          <th scope="col">heure_depart</th>
          <th scope="col">statut</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%.2f</td><td>%s</td><td>%s</td><td>%s</td></tr>",
             $element->getVilleDepart(), $element->getVilleArrivee(), $element->getPrix(),
             $element->getDateDepart(), $element->getHeureDepart(), $element->getStatut());
          }
          ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin trajet/viewMine -->
</body>
</html>
