==========================================================================
Projet LO07 2026 : BlaBlaCar
==========================================================================

Etudiant 1 : KHIAT Magdalena
Etudiant 2 : NEROT Emeline

URL du projet sur dev-isi.utt.fr :
http://dev-isi.utt.fr/~khiatmag/lo07_tp/projet/

==========================================================================
Mise en place
==========================================================================

1. Importer la base de donnees :
   - Le fichier outil/blablacar2026.sql contient les tables et les donnees.
   - L'importer dans la base MySQL (en local sur WAMP, et sur dev-isi.utt.fr).

2. Configuration de la base (app/controller/config.php) :
   - Par defaut LOCAL = TRUE  -> base locale WAMP
       dsn = mysql:dbname=blablacar2026;host=localhost
       username = root  /  password = (vide)
     (adapter le nom de la base / l'utilisateur a votre installation WAMP)
   - Avant le depot sur dev-isi.utt.fr : mettre LOCAL = FALSE
       dsn = mysql:dbname=khiatmag;host=localhost
       username = khiatmag  /  password = lHjX6bTS

3. Lancer l'application via index.php (qui reinitialise la session puis
   redirige vers app/router/router2.php?action=accueil).

==========================================================================
Architecture MVC
==========================================================================

projet/
  index.php                      reinitialise login_id et redirige
  outil/blablacar2026.sql        base de donnees fournie
  app/
    router/router2.php           routeur (action + parametres $args)
    controller/                  config.php + 9 controleurs
    model/                       Model.php (singleton PDO) + 6 modeles
    view/                        vues + fragments (header, menu dynamique,
                                 jumbotron, footer, table generique)

Comptes de test (mot de passe : secret)
  - administrateur : boss
  - conducteur     : trisprior, foureaton, jeaninematthews, marclem
  - passager       : calebprior, christinanobody, ...

==========================================================================
Fonctionnalites implementees
==========================================================================

Administrateur : A1 liste utilisateurs, A2 ajout conducteur, A3 ajout
  passager, A4 liste vehicules (proprietaire = prenom+nom, sans cles),
  A5 ajout vehicule, A6 liste villes, A7 ajout ville.
Conducteur : C1 mes vehicules, C2 mes trajets (actifs+passifs), C3 ajout
  trajet, C4 passagers d'un trajet actif, C5 cloture d'un trajet actif
  (statut passif + paiements passagers -> conducteur).
Passager : P1 mes reservations, P2 reservation d'un trajet actif.
Examinateur : E1 superglobales ($_SESSION et $_COOKIE), E2 ajout de 10
  reservations aleatoires sur des trajets actifs.
Connexion : F1 login (authentification par session), F2 deconnexion.

Innovations :
  - Innovation DATA : tableau de bord (top trajets reserves, villes de
    depart populaires, chiffre d'affaires potentiel par conducteur).
  - Innovation MVC : ModelGenerique + vue generique (fragmentTableGenerique)
    qui affichent automatiquement n'importe quelle requete (cols + datas),
    inspires de l'exercice "Recolte" du cours. Une seule vue alimente tout
    le tableau de bord -> moins de code duplique.
