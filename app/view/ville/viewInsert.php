<!-- ----- début ville/viewInsert -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3 class="text-primary">Formulaire de création d'une nouvelle ville</h3>
    <form role="form" method='get' action='router2.php'>
      <input type="hidden" name='action' value='villeCreated'>
      <div class="form-group mb-3">
        <label for="nom">nom</label>
        <input class="form-control" type="text" id="nom" name='nom' required>
      </div>
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin ville/viewInsert -->
</body>
</html>
