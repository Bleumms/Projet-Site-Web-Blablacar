<!-- ----- début reservation/viewSelect -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Sélectionnez un trajet actif :</h3>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group mb-3">
        <input type="hidden" name='action' value='reservationCreated'>
        <select class="form-control" id='id' name='id'>
            <?php
            // $results contient la liste des trajets actifs de l'application
            foreach ($results as $trajet) {
             printf("<option value='%d'>%s --> %s le %s à %s (%.2f &euro;)</option>",
               $trajet->getId(), $trajet->getVilleDepart(), $trajet->getVilleArrivee(),
               $trajet->getDateDepart(), $trajet->getHeureDepart(), $trajet->getPrix());
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin reservation/viewSelect -->
</body>
</html>
