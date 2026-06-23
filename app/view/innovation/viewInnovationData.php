<!-- ----- début innovation/viewInnovationData -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Innovation data</h3>
    

    <h4 class="mt-4">1/Recommandation de trajets retour</h4>
    <p>
      Sur sa page « Mes réservations », chaque passager se voit proposer automatiquement les trajets
      retour qui correspondent à ses réservations : s'il a réservé Toulouse -> Lille, l'application lui
      suggère les trajets actifs Lille -> Toulouse. Concrètment, parmis tous les trajets actifs, on ne
      garde que ceux dont l'inverse (mêmes villes, sens opposé) a déjà été réservé par ce passager.
      
    </p>

    <h4 class="mt-4">2/Tableau de bord statistique</h4>
    <p>Nous proposons aussi un tableau de bord qui regroupe plusieurs informations intéressantes sur
      l'activité de la plateforme : les trajets les plus réservés, les trajets actifs encore sans réservation, les
      villes de départ les plus populaires et les destinations les plus demandées.</p>

      <?php
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
