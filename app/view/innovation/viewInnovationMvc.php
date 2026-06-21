<!-- ----- début innovation/viewInnovationMvc -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3 class="text-primary">Innovation MVC : modèle et vue génériques</h3>

    <p>
      Dans le code MVC du cours, chaque fonctionnalité nécessite un nouveau modèle,
      un nouveau contrôleur et une nouvelle vue. Pour les affichages, cela conduit à
      dupliquer le même code de tableau dans de nombreuses vues.
    </p>
    <p>
      Notre proposition, inspirée de l'exercice « Recolte » du cours, factorise cet affichage :
    </p>
    <ul>
      <li><strong>ModelGenerique::executer($query)</strong> exécute n'importe quelle requête SELECT
          et retourne <code>array($cols, $datas)</code> (noms des colonnes + tuples).</li>
      <li><strong>fragmentTableGenerique.php</strong> est une vue unique qui affiche automatiquement
          n'importe quel résultat, quelles que soient les colonnes.</li>
    </ul>
    <p>
      <strong>Avantages :</strong> moins de code dupliqué, ajout d'un nouvel affichage en une seule
      ligne (la requête), et séparation stricte des responsabilités conservée. C'est cette même
      vue générique qui alimente le tableau de bord de l'innovation data.
    </p>

    <h4 class="mt-4">Démonstration : liste des trajets via la vue générique</h4>
      <?php
      $cols = $results[0];
      $datas = $results[1];
      include $root . '/app/view/fragment/fragmentTableGenerique.php';
      ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin innovation/viewInnovationMvc -->
</body>
</html>
