<?php

// ----- Lors de l'exécution du script index.php, la variable de SESSION
// ----- login_id est réinitialisée : aucun utilisateur n'est connecté par défaut.
session_start();
$_SESSION['login_id'] = -1;

header('Location: app/router/router2.php?action=accueil');

?>
