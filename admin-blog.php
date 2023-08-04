<?php
require_once 'config/config.php';
require_once 'queries/admin-check.php';
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
            <form method="post" action="queries/article-create.php" enctype='multipart/form-data'>

                <!-- adding text values -->
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input id="title" type="text" name="title" class="validate charactercount" data-length="50"/>
                        <label for="title">Titre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="content" name="content" class="materialize-textarea charactercount" data-length="1000"></textarea>
                        <label for="content">Contenu</label>
                    </div>
                </div>

                <!-- choosing pictures -->
                <div class="row">
                    <div class="col s12 m4">
                        <label for="image1">Vos images (pensez à toutes les sélectionner en une fois):</label>
                        <input type="file" name="upload[]" id="image1" accept="image/*" multiple>
                    </div>
                </div>

                <!-- setting visibility -->
                <div class="row">
                    <div class="col s12 m6">
                        <label for="visibility">Visibilité:</label>
                        <label>
                            <input class="with-gap" type="radio" name="visibility" value=0 checked />
                            <span>Public</span>
                        </label>
                        <label>
                            <input class="with-gap" type="radio" name="visibility" value=1 />
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
                                <option value=<?php echo $userData['id']; ?>> <?php echo $userData['last_name'] . " " . $userData['first_name']; ?></option>
                            <?php
                            };
                            ?>
                        </select>
                    </div>
                </div>
                <input class="btn purple accent-2" type="submit" name="submit" value="Créer">
                <?php
                if (isset($_SESSION["error"])) {
                    echo "<div class='left red-text'>" . $_SESSION["error"] . "</div>";
                    unset($_SESSION["error"]);
                };
                ?>
            </form>
        </div>
    </div>

    <div class="container ">
        <h4>Liste des articles</h4>

        <ul class="collapsible">
            <?php
            $sql = "SELECT * FROM `articles` ORDER BY `date` DESC";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
            $data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
            foreach ($data as $article) {

                $date = date_create($article["date"])
            ?>
                <li>
                    <div class="collapsible-header">
                        <h4><?php echo $article["title"] . " - " . date_format($date, "d/m/Y") ?></h4>
                    </div>
                    <div class="collapsible-body">
                        <span class="row">
                            <p class="col s12"><?php echo nl2br($article["content"]) ?></p>
                            <?php
                            $sql = "SELECT * FROM `articles-images` WHERE `article-id` =" . $article['id'];
                            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
                            $pre->execute(); //on l'execute
                            $articleimages = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
                            foreach ($articleimages as $oneimage) {
                            ?>
                                <div class="input-field col s12 m6">
                                    <img class="responsive-img" src="images/<?php echo $oneimage['filename'] ?>" alt="<?php echo $oneimage['filename'] ?>">
                                </div>
                            <?php
                            };
                            ?>
                        </span>
                        <div>
                            <?php
                            if ($article['visibility'] == 0) {
                                echo "<p class='red-text text-darken-4'>Tout le monde peut voir cet article.</p>";
                            } else {
                                echo "<p class='red-text text-darken-4'>peuvent voir cet article: ";
                                $sql = "SELECT `first_name`, `last_name` FROM `accounts` JOIN `articles-access` ON `accounts`.`id` = `articles-access`.`account-id` WHERE `articles-access`.`article-id` =" . $article['id'];
                                $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
                                $pre->execute(); //on l'execute
                                $articleaccess = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
                                foreach ($articleaccess as $user) {
                                    echo $user['first_name'] . ' ' . $user['last_name'] . '. ';
                                };
                                echo " </p>";
                            }
                            ?>
                        </div>
                        <form class="row" method="post" action="queries/article-delete.php">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <input class="btn purple accent-2" type="submit" name="submit" value="Supprimer">
                        </form>
                    </div>
                </li>
            <?php
            };
            ?>
        </ul>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>