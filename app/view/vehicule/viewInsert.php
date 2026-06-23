<!-- ----- début vehicule/viewInsert -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3 class="text-primary">Formulaire de création d'un nouveau véhicule</h3>
    <form role="form" method='get' action='router2.php'>
      <input type="hidden" name='action' value='vehiculeCreated'>
      <div class="form-group mb-3">
        <label for="marque">marque</label>
        <input class="form-control" type="text" id="marque" name='marque' required>
      </div>
      <div class="form-group mb-3">
        <label for="modele">modele</label>
        <input class="form-control" type="text" id="modele" name='modele' required>
      </div>
      <div class="form-group mb-3">
        <label for="annee">annee</label>
        <input class="form-control" type="number" id="annee" name='annee' required>
      </div>
      <div class="form-group mb-3">
        <label for="immatriculation">immatriculation</label>
        <input class="form-control" type="text" id="immatriculation" name='immatriculation' required>
      </div>
      <div class="form-group mb-3">
        <label for="proprietaire_id">Sélectionner un propriétaire</label>
        <select class="form-control" id="proprietaire_id" name='proprietaire_id' size="5" required>
            <?php
            // $results contient la liste des conducteurs
            foreach ($results as $conducteur) {
             printf("<option value='%d'>%s %s</option>", $conducteur->getId(), $conducteur->getPrenom(), $conducteur->getNom());
            }
            ?>
        </select>
      </div>
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin vehicule/viewInsert -->
</body>
</html>
