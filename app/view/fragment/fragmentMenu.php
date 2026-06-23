<!-- ----- début fragmentMenu -->
<?php
require_once $root . '/app/model/ModelUtilisateur.php';

//Récupération de l'utilisateur  connecté (variable de SESSION login_id)
$login_id = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : -1;
$connecte = NULL;
if ($login_id >= 0) {
 $tmp = ModelUtilisateur::getOne($login_id);
 if ($tmp) {
  $connecte = $tmp[0];
 }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container-fluid">

    <!-- Noms des deux étudiants, utilisateur connecté et solde -->
    <a class="navbar-brand" href="router2.php?action=accueil">
      <?php
      echo "KHIAT et NEROT";
      if ($connecte) {
       printf(" | %s %s | %.2f &euro; |", $connecte->getPrenom(), $connecte->getNom(), $connecte->getSolde());
      } else {
       echo " |";
      }
      ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
            aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menuPrincipal">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if ($connecte && $connecte->getRole() == 'administrateur') { ?>
        <!-- ----- Menu de l'administrateur -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=utilisateurReadAll">Liste des utilisateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=conducteurCreate">Ajout d'un conducteur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=passagerCreate">Ajout d'un passager</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=vehiculeReadAll">Liste des véhicules</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vehiculeCreate">Ajout d'un véhicule</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=villeReadAll">Liste des villes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=villeCreate">Ajout d'une ville</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php if ($connecte && $connecte->getRole() == 'conducteur') { ?>
        <!-- ----- Menu du conducteur -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conducteur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=vehiculeReadMine">Liste de mes véhicules</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetReadMine">Liste de tous mes trajets (actifs et passifs)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetCreate">Ajout d'un trajet</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetReadId&target=trajetPassagers">Liste des passagers de l'un de mes trajets actifs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetReadId&target=trajetClotured">Clôturer l'un de mes trajets actifs</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php if ($connecte && $connecte->getRole() == 'passager') { ?>
        <!-- ----- Menu du passager -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Passager</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=reservationReadMine">Liste de mes réservations</a></li>
            <li><a class="dropdown-item" href="router2.php?action=reservationCreate">Réservation d'un trajet actif</a></li>
          </ul>
        </li>
        <?php } ?>

        <!-- ----- Menu Innovations (toujours affiché) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=innovationData">Innovation data </a></li>
            <li><a class="dropdown-item" href="router2.php?action=innovationMvc">Innovation MVC </a></li>
          </ul>
        </li>

        <!-- ----- Menu Examinateur (toujours affiché) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examinateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=examinateurSuperglobales">SuperGlobales (Cookies et Sessions)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=examinateurReservations">Ajout de 10 réservations aléatoires</a></li>
            
          </ul>
        </li>

        <!-- ----- Menu Se connecter (toujours affiché) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=connexionLogin">Login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=connexionLogout">Déconnexion</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- ----- fin fragmentMenu -->
