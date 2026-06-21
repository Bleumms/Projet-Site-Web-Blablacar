<!-- ----- debut config -->
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=khiatmag;host=localhost;charset=utf8';
$username = 'khiatmag';
$password = 'lHjX6bTS';

// ----- Mettre LOCAL à TRUE pour travailler sur WAMP (localhost),
// ----- et à FALSE avant de déposer le projet sur dev-isi.utt.fr
if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}

if (LOCAL) {
    // Configuration de la base de données sur localhost (WAMP)
    $dsn = 'mysql:dbname=blablacar2026;host=localhost;charset=utf8';
    $username = 'root';
    $password = '';
}

// chemin absolu vers le répertoire du projet
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->
