<!-- ----- début utilisateur/viewInsertPassager -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3 class="text-primary">Formulaire de création d'un nouveau passager</h3>
    <form role="form" method='get' action='router2.php'>
      <input type="hidden" name='action' value='passagerCreated'>
      <div class="form-group mb-3">
        <label for="nom">Nom</label>
        <input class="form-control" type="text" id="nom" name='nom' required>
      </div>
      <div class="form-group mb-3">
        <label for="prenom">Prénom</label>
        <input class="form-control" type="text" id="prenom" name='prenom' required>
      </div>
      <div class="form-group mb-3">
        <label for="solde">Solde initial</label>
        <input class="form-control" type="number" step="any" id="solde" name='solde' value="0" required>
      </div>
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin utilisateur/viewInsertPassager -->
</body>
</html>
