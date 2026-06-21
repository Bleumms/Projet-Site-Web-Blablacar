<!-- ----- début trajet/viewInsert -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3 class="text-primary">Création d'un nouveau trajet</h3>
    <form role="form" method='get' action='router2.php'>
      <input type="hidden" name='action' value='trajetCreated'>

      <div class="form-group mb-3">
        <label for="ville_depart">Ville de départ</label>
        <select class="form-control" id="ville_depart" name='ville_depart' required>
            <?php
            foreach ($villes as $ville) {
             printf("<option value='%d'>%s</option>", $ville->getId(), $ville->getNom());
            }
            ?>
        </select>
      </div>

      <div class="form-group mb-3">
        <label for="ville_arrivee">Ville d'arrivée</label>
        <select class="form-control" id="ville_arrivee" name='ville_arrivee' required>
            <?php
            foreach ($villes as $ville) {
             printf("<option value='%d'>%s</option>", $ville->getId(), $ville->getNom());
            }
            ?>
        </select>
      </div>

      <div class="form-group mb-3">
        <label for="vehicule_id">Sélection d'un véhicule</label>
        <select class="form-control" id="vehicule_id" name='vehicule_id' required>
            <?php
            foreach ($vehicules as $vehicule) {
             printf("<option value='%d'>%s %s (%s)</option>", $vehicule->getId(),
               $vehicule->getMarque(), $vehicule->getModele(), $vehicule->getImmatriculation());
            }
            ?>
        </select>
      </div>

      <div class="form-group mb-3">
        <label for="prix">Prix du trajet</label>
        <input class="form-control" type="number" step="any" id="prix" name='prix' value="10" required>
      </div>

      <div class="form-group mb-3">
        <label for="date_depart">Date du trajet :</label>
        <input class="form-control" type="date" id="date_depart" name='date_depart' required>
      </div>

      <div class="form-group mb-3">
        <label for="heure_depart">Heure du trajet :</label>
        <input class="form-control" type="time" id="heure_depart" name='heure_depart' required>
      </div>

      <button class="btn btn-success" type="submit">Submit</button>
      <button class="btn btn-danger" type="reset">Reset</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin trajet/viewInsert -->
</body>
</html>
