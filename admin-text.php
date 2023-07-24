<?php
require_once 'config/config.php';
require_once 'queries/admin-check.php';
?>

<!DOCTYPE html>
<html lang="fr">

<?php
require_once "components/head.php";
?>

<body>

    <?php
    include 'components/admin-nav.php';
    ?>

    <div class="container">
        <h3>Gestion du texte sur les pages</h3>
    </div>

    <!-- liste des différents paragraphes -->


    <div class="container">
        <h4 id="home-top-box-edit">Page d'accueil</h4>

        <!-- top boxes -->
        <div class="row">
            <?php
            $sql = "SELECT * FROM `home-intro-boxes` WHERE 1";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
            $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
            foreach ($boxes as $box) {
            ?>
                <div class="col s12 m4">
                    <div class="row card">
                        <!-- MAKE THE ACTION PHP -->
                        <form class="col s12" method="post" action="queries/home-box-update.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <textarea name="title" type="text" class="validate materialize-textarea charactercount" data-length="60"><?php echo $box["title"] ?></textarea>
                                    <label for="title">Titre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="content" type="text" class="validate materialize-textarea charactercount" data-length="900"><?php echo $box["content"] ?></textarea>
                                    <label for="content">Contenu</label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $box['id']; ?>">
                            <div class="row">
                                <div class="input-field col s12">
                                    image actuelle:
                                </div>
                                <div class="input-field col s12">
                                    <img class="responsive-img" src="images/<?php echo $box['image'] ?>" alt="<?php echo $box['image'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn blue accent-2">
                                        <span>File</span>
                                        <input type="file" name="image" accept="image/*">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <button class="btn blue accent-2" type="submit">Modifier</button>
                        </form>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>

        <!-- middle boxes -->
        <div class="row" id="home-middle-edit">
            <?php
            $sql = "SELECT * FROM `home-middle-boxes` WHERE 1";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
            $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
            foreach ($boxes as $box) {
            ?>
                <div class="col s12 m4 offset-m1">
                    <div class="row card">
                        <form class="col s12" method="post" action="queries/home-middle-update.php">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <textarea name="title" type="text" class="validate materialize-textarea charactercount" data-length="60"><?php echo $box["title"] ?></textarea>
                                    <label for="title">Titre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="content" type="text" class="validate materialize-textarea charactercount" data-length="900"><?php echo $box["content"] ?></textarea>
                                    <label for="content">Contenu</label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $box['id']; ?>">
                            <button class="btn blue accent-2" type="submit">Modifier</button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </div>

        <h4 id="footer-edit">Pied de page</h4>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `footer-boxes` WHERE 1";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
            $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
            foreach ($boxes as $box) {
            ?>
                <div class="col s12 m4 offset-m1">
                    <div class="row card">
                        <form class="col s12" method="post" action="queries/footer-box-update.php">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <textarea name="title" type="text" class="validate materialize-textarea charactercount" data-length="60"><?php echo $box["title"] ?></textarea>
                                    <label for="title">Titre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="content" type="text" class="validate materialize-textarea charactercount" data-length="300"><?php echo $box["content"] ?></textarea>
                                    <label for="content">Contenu</label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $box['id']; ?>">
                            <button class="btn blue accent-2" type="submit">Modifier</button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>