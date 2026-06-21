<!-- ----- début trajet/viewPassagers -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Liste des passagers du trajet n°<?php echo $trajet->getId(); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">nom</th>
          <th scope="col">prenom</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // $results contient la liste des passagers (doublons possibles)
          foreach ($results as $passager) {
           printf("<tr><td>%s</td><td>%s</td></tr>", $passager['nom'], $passager['prenom']);
          }
          ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin trajet/viewPassagers -->
</body>
</html>
