<!-- ----- début utilisateur/viewInserted -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results > 0) {
     echo ("<h3>Le nouveau " . $role . " a été ajouté</h3>");
     echo ("<ul>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>role = " . $role . "</li>");
     echo ("<li>login = " . $login . "</li>");
     echo ("<li>solde = " . $_GET['solde'] . "</li>");
     echo ("</ul>");
    } else {
     echo ("<h3>Problème lors de l'ajout du " . $role . "</h3>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin utilisateur/viewInserted -->
</body>
</html>
