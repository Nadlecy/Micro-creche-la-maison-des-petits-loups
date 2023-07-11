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
        <nav id="navbar" class="red lighten-3" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.php" class="brand-logo">
                    <img class="fit-picture" src="/images/logo.jpg" alt="Logo">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="blog.php">Actualité</a></li>
                    <li><a href="preinscriptions.php">Préinscriptions</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li>test</li>
                    <?php } else { ?>
                        <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
                    <?php }; ?>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="blog.php">Actualité</a></li>
                    <li><a href="preinscriptions.php">Préinscriptions</a></li>
                    <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    <!-- Login Modal !! ISSUE SOMEWHERE !!-->
    <div id="login-modal" class="modal col s12 m6 l4">
        <div class="modal-content">
            <h4>Connexion</h4>
            <form class="row" method="post" action="queries/login.php">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix">person</i>
                    <input id="email" type="text" name="email" class="validate" />
                    <label for="email">Adresse Email</label>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 offset-m3">
                        <i class="material-icons prefix ">key</i>
                        <input id="password" type="password" name="password" class="validate" />
                        <label for="password">Mot de Passe</label>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <?php
            if (isset($_SESSION["error"])) {
                echo "<div class='left red '>" . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]);
            };
            ?>
            <a href="#!" class="modal-close waves-effect waves btn-flat">Annuler</a>
            <button class="btn waves-effect waves-light pink lighten-1" type="submit">Se Connecter</button>
            </form>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>