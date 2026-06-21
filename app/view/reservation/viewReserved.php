<!-- ----- début reservation/viewReserved -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results > 0) {
     echo ("<h3>Votre réservation a été enregistrée</h3>");
     echo ("<ul>");
     echo ("<li>n° de réservation = " . $results . "</li>");
     echo ("<li>trajet réservé = n°" . $_GET['id'] . "</li>");
     echo ("</ul>");
    } else {
     echo ("<h3>Problème lors de la réservation</h3>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin reservation/viewReserved -->
</body>
</html>
