<!-- ----- début reservation/viewMine -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Liste de mes réservations</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">date_depart</th>
          <th scope="col">heure_depart</th>
          <th scope="col">depart</th>
          <th scope="col">destination</th>
          <th scope="col">conducteur</th>
          <th scope="col">vehicule</th>
          <th scope="col">immatriculation</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
             $element->getDateDepart(), $element->getHeureDepart(), $element->getDepart(),
             $element->getDestination(), $element->getConducteur(), $element->getVehicule(),
             $element->getImmatriculation());
          }
          ?>
      </tbody>
    </table>

    <h3 class="text-primary mt-4">Trajets recommandés pour vous</h3>
    <p>D'après vos réservations, voici les trajets retour encore disponibles.</p>
      <?php
      $cols = $reco[0];
      $datas = $reco[1];
      if (count($datas) == 0) {
       echo ("<p>Aucune recommandation pour le moment.</p>");
      } else {
       include $root . '/app/view/fragment/fragmentTableGenerique.php';
      }
      ?>
  </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin reservation/viewMine -->
</body>
</html>
