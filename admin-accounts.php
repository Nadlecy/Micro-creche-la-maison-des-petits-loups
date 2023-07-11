<?php
require_once 'config/config.php';
?>

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

    <?php
    include 'components/admin-nav.php';
    ?>
    <div class="container"><h3>Gestion des Comptes</h3></div>
    <!-- account creation -->
    <div class="container">
        <h4>Nouveau compte</h4>
        <div class="card ">
            <form class="row amber lighten-4" method="post" action="queries/signup.php">
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix ">person</i>
                    <input id="first_name" type="text" name="first_name" class="validate" />
                    <label for="first_name" class="">Prénom</label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="last_name" type="text" name="last_name" class="validate" />
                    <label for="last_name" class="">Nom de Famille</label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="child_name" type="text" name="child_name" class="validate" />
                    <label for="child_name" class="">Prénom de l'enfant</label>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix ">mail</i>
                    <input id="email" type="email" name="email" class="validate" />
                    <label for="email" class="">Email</label>
                    <span class="helper-text" data-error="Adresse invalide" data-success=""></span>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix ">key</i>
                    <input id="password" type="password" name="password" class="validate" />
                    <label for="password" class="">Mot de passe temporaire</label>
                </div>
                <div class="input-field col s12 m4">
                    <select name="admin">
                        <option value="0" selected>Utilisateur</option>
                        <option value="1">Administrateur</option>
                    </select>
                    <label>Type de compte</label>
                </div>
                <button class="btn waves-effect waves-light pink lighten-1" type="submit">Créer</button>
                <?php
                if (isset($_SESSION["error"])) {
                    echo "<div class='left red '>" . $_SESSION["error"] . "</div>";
                    unset($_SESSION["error"]);
                };
                ?>
            </form>
        </div>
    </div>

    <div class="container">
        <h4>Liste d'utilisateurs</h4>
        <?php
        $sql = "SELECT `id`, `last_name`, `first_name`, `child_name`, `email`, `admin` FROM `accounts` WHERE 1";
        $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
        $pre->execute(); //on l'execute
        $data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
        foreach ($data as $userData) {
        ?>
            <!-- account cards -->
            <div class="card">
                <div class="card-content amber lighten-4">
                    <div class="row">
                        <div class="col s12 m6">
                            <p><strong>Nom :</strong> <?php echo $userData['last_name']; ?></p>
                            <p><strong>Prénom :</strong> <?php echo $userData['first_name']; ?></p>
                            <p><strong>Prénom de l'enfant:</strong> <?php echo $userData['child_name']; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                            <p><strong>Admin:</strong> <?php echo $userData['admin'] ? 'Oui' : 'Non'; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- button to delete a user from database -->
                        <form class="col s12 m3" method="post" action="queries/user-delete.php">
                            <input type='hidden' name='userId' value="<?php echo $userData['id'] ?>" />
                            <button type='submit'>Supprimer</button>
                        </form>
                        <!-- button to toggle a user's admin access -->
                        <form class="col s12 m3" method="post" action="queries/admin-toggle.php">
                            <input type='hidden' name='userId' value="<?php echo $userData['id'] ?>" />
                            <button type='submit'>Ajouter/retirer en admin</button>
                        </form>
                        <!-- password reset -->
                        <form class="col s12 m6" method="post" action="queries/user-pwreset.php">
                            <input type='hidden' name='userId' value="<?php echo $userData['id'] ?>" />
                            <div class=" col s12 m6 offset-m3">
                                <input id="newpassword" type="text" name="newpassword" />
                                <label for="newpassword">Réinitialiser le Mot de Passe</label>
                            </div>
                            <button type='submit'>Réinitialiser</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php
        };
        ?>
    </div>

    <!-- password reset modal -->
    <div id="password-reset-modal" class="modal">
        <div class="modal-content">
            <h4>Réinitialiser Mot de Passe</h4>
            <p>A bunch of text</p>

            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>