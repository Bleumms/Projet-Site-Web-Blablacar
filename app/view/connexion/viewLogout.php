<!-- ----- début connexion/viewLogout -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3 class="text-primary">Vous êtes déconnecté</h3>
    <p>La variable de SESSION login_id a été réinitialisée. Aucun utilisateur n'est actuellement connecté.</p>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin connexion/viewLogout -->
</body>
</html>
