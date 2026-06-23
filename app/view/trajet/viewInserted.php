<!-- ----- début trajet/viewInserted -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results > 0) {
     echo ("<h3>Le nouveau trajet a été ajouté</h3>");
     echo ("<ul>");
     echo ("<li>prix = " . $_GET['prix'] . "</li>");
     echo ("<li>date_depart = " . $_GET['date_depart'] . "</li>");
     echo ("<li>heure_depart = " . $_GET['heure_depart'] . "</li>");
     echo ("<li>statut = actif</li>");
     echo ("</ul>");
    } else {
     echo ("<h3>Problème lors de l'ajout du trajet</h3>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin trajet/viewInserted -->
</body>
</html>
