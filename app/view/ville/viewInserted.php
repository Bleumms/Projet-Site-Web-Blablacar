<!-- ----- début ville/viewInserted -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    if ($results > 0) {
     echo ("<h3>La nouvelle ville a été ajoutée</h3>");
     echo ("<ul>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("</ul>");
    } else {
     echo ("<h3>Problème lors de l'ajout de la ville</h3>");
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin ville/viewInserted -->
</body>
</html>
