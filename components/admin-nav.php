<!DOCTYPE html>
<html lang="fr">

<body>
    <div id="wrapper">
        <nav id="navbar" class="purple" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo">
                    <img id="logo-nav" src="images/logo-maison-des-ptits-loups-la-seyne.svg" width="165px" height="75px" alt="Logo">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Retour Accueil</a></li>
                    <li><a href="admin-accounts.php">Comptes</a></li>
                    <li><a href="admin-blog.php">News</a></li>
                    <li><a href="admin-text.php">Affichage</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="queries/logout.php">Se déconnecter</a></li>
                    <?php }; ?>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a class="sidenav-close" href="#!"><i class="material-icons prefix grey-text text-darken-3">close</i> Fermer</a></li>
                    <li><a href="index.php">Retour Accueil</a></li>
                    <hr>
                    <li><a href="admin-accounts.php">Comptes</a></li>
                    <hr>
                    <li><a href="admin-blog.php">News</a></li>
                    <hr>
                    <li><a href="admin-text.php">Affichage</a></li>
                    <hr>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="queries/logout.php">Se déconnecter</a></li>
                    <?php }; ?>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>