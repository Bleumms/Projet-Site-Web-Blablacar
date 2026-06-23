<!-- ----- début vehicule/viewInserted -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results > 0) {
     echo ("<h3>Le nouveau véhicule a été ajouté</h3>");
     echo ("<ul>");
     echo ("<li>marque = " . $_GET['marque'] . "</li>");
     echo ("<li>modele = " . $_GET['modele'] . "</li>");
     echo ("<li>annee = " . $_GET['annee'] . "</li>");
     echo ("<li>immatriculation = " . $_GET['immatriculation'] . "</li>");
     echo ("</ul>");
    } else {
     echo ("<h3>Problème lors de l'ajout du véhicule</h3>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin vehicule/viewInserted -->
</body>
</html>
