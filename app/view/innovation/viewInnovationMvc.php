<!-- ----- début innovation/viewInnovationMvc -->
<?php require ($root . '/app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

   <h3 class="text-primary">Innovation MVC : un modèle et une vue génériques</h3>

    <p>
      Dans le MVC vu en cours, chaque liste à afficher oblige à écrire une nouvelle vue avec ses
      colonnes à la main, alimentée par une méthode de modèle propre à une table. D'une vue à l'autre,
      ce code se ressemble énormément : on recopie presque le même tableau partout, ce qui alourdit
      le projet.
    </p>
    <p>
      Pour éviter celà, nous avons imaginé deux fichiers qui permettent de simplifier l'affichage de ces données:
    </p>
    <ul>
      <li>app/model/ModelGenerique.php, Model unique qui ne dépend d'aucune table.
          Sa méthode executer($query lance n'importe quelle requête SELECT et renvoie à la fois la liste des noms de colonnes et la liste des lignes, du résultat.</li>
      <li>app/view/fragment/fragmentTableGenerique.php, Vue unique qui reçoit ces
          deux listes et construit le tableau seule, quelles que soient les colonnes renvoyées.</li>
    </ul>
    <p>
Nous avons utilisé cette logique pour réaliser le tableau de bord (innovation data), mais avons préféré garder le système classique pour le reste du projet. En utilisant cette amélioration il faut également garder la logique mvc basique pour le reste des requêtes qui ne sont pas des affichages (ex insert, mise à jour, etc)
    </p>
    <p>
      Avantages : beaucoup moins de code dupliqué, l'ajout d'un nouvel affichage se
      résume à écrire une unique requête (sans nouveau modèle ni nouvelle vue), et l'on a bien la logique mvc. On centralise donc d'un côté l'accès aux données dans un seul modèle, et de l'autre l'affichage dans une seule vue, au lieu de les répéter pour chaque table.
    </p>

   
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin innovation/viewInnovationMvc -->
</body>
</html>
