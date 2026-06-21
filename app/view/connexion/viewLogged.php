<!-- ----- début connexion/viewLogged -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($success) {
     echo ("<h3>Bienvenue " . $connecte->getPrenom() . " " . $connecte->getNom() . " !</h3>");
     echo ("<p>Vous êtes connecté en tant que <strong>" . $connecte->getRole() . "</strong>.</p>");
     echo ("<p>Le menu correspondant à votre rôle est maintenant disponible dans la barre de navigation.</p>");
    } else {
     echo ("<h3>Échec de la connexion</h3>");
     echo ("<p>Le login ou le mot de passe est incorrect.</p>");
     echo ("<a class='btn btn-primary' href='router2.php?action=connexionLogin'>Réessayer</a>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin connexion/viewLogged -->
</body>
</html>
