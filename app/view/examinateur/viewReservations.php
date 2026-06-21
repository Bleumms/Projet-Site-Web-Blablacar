<!-- ----- début examinateur/viewReservations -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">10 nouvelles réservations aléatoires</h3>
    <ol>
        <?php
        foreach ($results as $message) {
         echo ("<li>" . $message . "</li>");
        }
        ?>
    </ol>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin examinateur/viewReservations -->
</body>
</html>
