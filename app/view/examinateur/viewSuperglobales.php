<!-- ----- début examinateur/viewSuperglobales -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">SuperGlobales</h3>

    <h4>$_SESSION</h4>
    <pre><?php print_r($_SESSION); ?></pre>

    <h4>$_COOKIE</h4>
    <pre><?php print_r($_COOKIE); ?></pre>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin examinateur/viewSuperglobales -->
</body>
</html>
