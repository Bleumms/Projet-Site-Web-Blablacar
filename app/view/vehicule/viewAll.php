<!-- ----- début vehicule/viewAll -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Liste des véhicules</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">marque</th>
          <th scope="col">modele</th>
          <th scope="col">annee</th>
          <th scope="col">immatriculation</th>
          <th scope="col">propriétaire</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // Interdit d'afficher les clés primaires : le propriétaire est construit à partir du prénom et du nom
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td></tr>",
             $element->getMarque(), $element->getModele(), $element->getAnnee(),
             $element->getImmatriculation(), $element->getProprietaire());
          }
          ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin vehicule/viewAll -->
</body>
</html>
