<!-- ----- début connexion/viewLogin -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3 class="text-primary">Connexion</h3>
    <form role="form" method='get' action='router2.php'>
      <input type="hidden" name='action' value='connexionLogged'>
      <div class="form-group mb-3">
        <label for="login">Login</label>
        <input class="form-control" type="text" id="login" name='login' required>
      </div>
      <div class="form-group mb-3">
        <label for="password">Mot de passe</label>
        <input class="form-control" type="password" id="password" name='password' required>
      </div>
      <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin connexion/viewLogin -->
</body>
</html>
