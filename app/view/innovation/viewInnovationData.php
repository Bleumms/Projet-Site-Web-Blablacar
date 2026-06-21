<!-- ----- début innovation/viewInnovationData -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Innovation data : tableau de bord</h3>
    <p>Exploitation originale des données : croisement des trajets, réservations, villes et utilisateurs.</p>

      <?php
      // Chaque bloc est affiché grâce à la même vue générique (innovation MVC)
      foreach ($results as $bloc) {
       echo ("<h4 class='mt-4'>" . $bloc['titre'] . "</h4>");
       $cols = $bloc['data'][0];
       $datas = $bloc['data'][1];
       include $root . '/app/view/fragment/fragmentTableGenerique.php';
      }
      ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin innovation/viewInnovationData -->
</body>
</html>
