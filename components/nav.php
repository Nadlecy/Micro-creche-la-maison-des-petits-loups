<!DOCTYPE html>
<html lang="fr">

<body>
    <div id="wrapper">
        <nav id="navbar" class="red lighten-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo">
                    <img id="logo-nav" src="images/logo-maison-des-ptits-loups-la-seyne.svg" width="165px" height="75px" alt="Logo">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="blog.php">Actualité</a></li>
                    <li><a href="philosophie.php">Philosophie</a></li>
                    <li><a href="local.php">Locaux</a></li>
                    <?php
                    $sql = "SELECT * FROM `register-text`";
                    $pre = $pdo->prepare($sql);
                    $pre->execute();
                    $registerpagecontent = $pre->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($registerpagecontent as $register) {
                        $form = $register['form-link'];
                    }
                    ?>
                    <li><a target="_blank" href=<?php echo $form ?>>Préinscriptions</a></li>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <li><a href="my-account.php">Mon compte</a></li>
                    <?php } else { ?>
                        <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
                    <?php
                    };
                    if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 1) { ?>
                        <li><a class="purple" href="admin-accounts.php">Admin</a></li>
                    <?php } ?>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a class="sidenav-close" href="#!"><i class="material-icons prefix grey-text text-darken-3">close</i> Fermer</a></li>
                    <li><a href="index.php">Accueil</a></li>
                    <hr>
                    <li><a href="blog.php">Actualité</a></li>
                    <hr>
                    <li><a target="_blank" href=<?php echo $form ?>>Préinscriptions</a></li>
                    <hr>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="my-account.php">Mon compte</a></li>
                    <?php } else { ?>
                        <li><a data-target="login-modal" class="modal-trigger">Se Connecter</a></li>
                    <?php };
                    if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 1) { ?>
                        <hr>
                        <li><a class="purple" href="admin-accounts.php">Admin</a></li>
                    <?php } ?>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    <!-- Login Modal -->
    <div id="login-modal" class="modal col s12 m6 l4">
        <div class="modal-content">
            <h4>Connexion</h4>
            <form class="row" method="post" action="queries/login.php">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="email" type="text" name="email" class="validate" />
                    <label for="email">Adresse Email</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix ">key</i>
                    <input id="password" type="password" name="password" class="validate" />
                    <label for="password">Mot de Passe</label>
                </div>
        </div>
        <div class="modal-footer">
            <?php
            if (isset($_SESSION["error"])) {
                echo "<div class='left red-text'>" . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]);
            };
            ?>
            <a href="#!" class="modal-close waves-effect waves btn-flat">Annuler</a>
            <button class="btn waves-effect waves-light red lighten-2" type="submit">Se Connecter</button>
            </form>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>