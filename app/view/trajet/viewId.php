<!-- ----- début trajet/viewId -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';

      // $results contient la liste des trajets actifs du conducteur
      // $target contient la méthode statique cible (trajetPassagers ou trajetClotured)
      ?>

    <h3 class="text-primary">Sélectionnez l'un de mes trajets actifs</h3>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group mb-3">
        <input type="hidden" name='action' value='<?php echo ($target); ?>'>
        <select class="form-control" id='id' name='id'>
            <?php
            foreach ($results as $trajet) {
             printf("<option value='%d'>%s vers %s le %s à %s</option>",
               $trajet->getId(), $trajet->getVilleDepart(), $trajet->getVilleArrivee(),
               $trajet->getDateDepart(), $trajet->getHeureDepart());
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

  <!-- ----- fin trajet/viewId -->
</body>
</html>
