<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Maison des Petits Loups</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <!--                                                        VRemove all this afterV              -->
    <link type="text/css" rel="stylesheet" href="css/style.css?<?php echo time(); ?>" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>


<body>
    <div id="wrapper">
        <nav id="navbar" class="blue accent-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.php" class="brand-logo">
                    <img class="fit-picture" src="/images/logo.jpg" alt="Logo">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Retour</a></li>
                    <li><a href="admin-accounts.php">Comptes</a></li>
                    <li><a href="admin-blog.php">Newsletter</a></li>
                    <li><a href="admin-text.php">Affichage</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li>test</li>
                    <?php } else { ?>
                        <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
                    <?php }; ?>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="index.php">Retour</a></li>
                    <li><a href="admin-accounts.php">Comptes</a></li>
                    <li><a href="admin-blog.php">Newsletter</a></li>
                    <li><a href="admin-text.php">Affichage</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li>test</li>
                    <?php } else { ?>
                        <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
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