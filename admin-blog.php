<?php
require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="fr">

<?php
  require "components/head.php";
?>

<body>

    <?php
    include 'components/admin-nav.php';
    ?>

    <div class="container">
        <h3>Gestion de l'Actualité</h3>
    </div>
    <!-- post creation -->
    <div class="container">
        <h4>Nouvel article</h4>
        <div class="card">
            <form method="post" action="queries/article-create.php">

                <!-- adding text values -->
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input id="title" type="text" name="title" class="validate" />
                        <label for="title">Titre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="content" name="content" class="materialize-textarea" data-length="1000"></textarea>
                        <label for="content">Contenu</label>
                    </div>
                </div>

                <!-- choosing pictures -->
                <div class="row">
                    <div class="col s12 m4">
                        <label for="image1">Image 1:</label>
                        <input type="file" name="image1" id="image1" accept="image/*">
                    </div>
                    <div class="col s12 m4">
                        <label for="image2">Image 2:</label>
                        <input type="file" name="image2" id="image2" accept="image/*">
                    </div>
                    <div class="col s12 m4">
                        <label for="image3">Image 3:</label>
                        <input type="file" name="image3" id="image3" accept="image/*">
                    </div>
                </div>

                <!-- setting visibility -->
                <div class="row">
                    <div class="col s12 m6">
                        <label for="visibility">Visibilité:</label>
                        <label>
                            <input class="with-gap" type="radio" name="visibility" value="public" checked />
                            <span>Public</span>
                        </label>
                        <label>
                            <input class="with-gap" type="radio" name="visibility" value="private" />
                            <span>Private</span>
                        </label>
                    </div>
                    <!-- selecting recipients -->
                    <div class="col s12 m6">
                        <label for="recipients">Destinataires:</label>
                        <select name="recipients[]" id="recipients" multiple>
                            <?php
                            $sql = "SELECT `id`, `last_name`, `first_name` FROM `accounts` WHERE 1 ORDER BY last_name";
                            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
                            $pre->execute(); //on l'execute
                            $data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
                            foreach ($data as $userData) {
                            ?>
                                <option value=<?php echo $userData['id']; ?>> <?php echo $userData['last_name']; ?> <?php echo $userData['first_name']; ?></option>
                            <?php
                            };
                            ?>
                        </select>
                    </div>
                </div>

                <input type="submit" name="submit" value="Créer">
            </form>
        </div>
    </div>

    <div class="container">
        <h4>Liste des articles</h4>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>