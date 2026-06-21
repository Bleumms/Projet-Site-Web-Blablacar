<!-- ----- début trajet/viewClotured -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results) {
     echo ("<h3>Le trajet n°" . $_GET['id'] . " a été clôturé (statut passif)</h3>");
     echo ("<p>Les paiements des passagers vers le conducteur ont été effectués.</p>");
    } else {
     echo ("<h3>Problème lors de la clôture du trajet</h3>");
     echo ("<p>Le trajet est peut-être déjà clôturé.</p>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin trajet/viewClotured -->
</body>
</html>
