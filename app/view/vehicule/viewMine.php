<!-- ----- début vehicule/viewMine -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Liste des véhicules du conducteur <?php echo $connecte->getPrenom() . " " . $connecte->getNom(); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">marque</th>
          <th scope="col">modele</th>
          <th scope="col">annee</th>
          <th scope="col">immatriculation</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>",
             $element->getId(), $element->getMarque(), $element->getModele(),
             $element->getAnnee(), $element->getImmatriculation());
          }
          ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin vehicule/viewMine -->
</body>
</html>
