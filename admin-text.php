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

        <!-- liste des différents paragraphes -->


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
                                <div class="col s12">
                                    image actuelle:
                                </div>
                                <div class="col s12">
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
    </div>
    <hr>
    <!-- middle boxes -->
    <section id="home-middle-edit">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `home-middle-boxes` WHERE 1";
            $pre = $pdo->prepare($sql);
            $pre->execute();
            $boxes = $pre->fetchAll(PDO::FETCH_ASSOC);
            foreach ($boxes as $box) {
            ?>
                <div class="col s12 l3 offset-l1">
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
    </section>

    <div class="container">
        <!-- pictures of the kindergarten -->
        <div class="row" id="home-bottom-edit">
            <h4>Images des locaux</h4>

            <!-- create new image with caption -->
            <div class="card">
                <h5>Nouvelle image</h5>
                <form enctype="multipart/form-data" method="post" action="queries/home-bottom-images-create.php">
                    <div class="row">
                        <div>
                            <div class="input-field col s12 m6">
                                <textarea id="caption" name="caption" class="materialize-textarea charactercount" data-length="1000"></textarea>
                                <label for="caption">Légende</label>
                            </div>
                        </div>
                        <div class="file-field input-field col s12 m6">
                            <div class="btn blue accent-2">
                                <span>File</span>
                                <input type="file" name="image" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m2">
                            <button class="btn waves-effect waves-light blue accent-2" type="submit">Nouvelle image</button>
                        </div>
                        <div class="col s12 m10">
                            <?php
                            if (isset($_SESSION["errorbottom"])) {
                                echo "<div class='right red-text'>" . $_SESSION["errorbottom"] . "</div>";
                                unset($_SESSION["errorbottom"]);
                            };
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- show the existing ones, let admin delete them -->
            <?php
            $sql = "SELECT * FROM `inside-images` WHERE 1";
            $pre = $pdo->prepare($sql);
            $pre->execute();
            $images = $pre->fetchAll(PDO::FETCH_ASSOC);
            foreach ($images as $image) {
            ?>
                <div class="col s12 m4">
                    <div class="row card">
                        <div class="row">
                            <div class="col s12">
                                <p> Légende : <br>
                                    <?php echo $image["caption"] ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                Image :
                            </div>
                            <div class="col s12">
                                <img class="responsive-img" src="images/<?php echo $image['filename'] ?>" alt="<?php echo $image['filename'] ?>">
                            </div>
                        </div>
                        <form class="col s12" method="post" action="queries/home-bottom-images-delete.php">
                            <input type="hidden" name="id" value="<?php echo $image['id']; ?>">
                            <button class="btn blue accent-2" type="submit">Supprimer</button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </div>

        old text <br>
        Nos locaux :

        Situé au Business Park des Playes (anciennement l'Espace Noral), le local d'une superficie de 93 m2, en rez-de-chaussée, était un bureau d'architectes.

        Vous pourrez aisément vous garer.

        Huit fenêtres d'une largeur totale de 11,50 m apportent de la lumière qui peut être tamisée par des stores vénitiens.

        Afin de laisser un grand espace de vie pour les enfants, nous avons créé autour de ce dernier :

        Un accueil où vous pourrez prendre le temps d'habiller ou déshabiller votre « petit bout », un panneau d'affichage vous indiquera les moments forts de la micro-crèche,

        Un bureau où vous pourrez parler en toute discrétion avec l'équipe,

        Une chambre pour les « bébés »,

        Une chambre pour les « grands » qui servira de salle d'activité en dehors des siestes
        (Ces chambres sont équipées de cloisons phoniques afin que le sommeil des «P'tits Loups» ne soit pas perturbé par le bruit),

        Un espace change où se trouvent une table à langer, un toilette ainsi qu'un lavabo pour les petits et une armoire où seront rangés les changes (à noter que pour l'intimité des enfants un seul d'entre eux sera changé au fur et à mesure),

        Un espace buanderie avec lave linge et sèche linge,

        Un espace cuisine avec évier, lave main à commande non manuelle, deux réfrigérateurs (un pour les enfants, un pour le personnel) ainsi qu'un micro onde,

        Et enfin une large pièce pour les enfants que l'on a rendu « cocooning » grâce à différents espaces dédiés au regroupement, à la lecture, aux chansons, aux activités, à la motricité, aux jeux de rôle (poupée, cuisine).



        <hr>


        <!-- register page content -->
        <h4 id="register-edit">Préinscription</h4>
        <?php
        $sql = "SELECT * FROM `register-text`";
        $pre = $pdo->prepare($sql);
        $pre->execute();
        $registerpagecontent = $pre->fetchAll(PDO::FETCH_ASSOC);
        foreach ($registerpagecontent as $register) {
        ?>
            <div class="card">
                <form method="post" action="queries/register-update.php">
                    <div class="row">
                        <div class="col s12 l6">
                            <div class="row">
                                <div class="input-field col s12 l6 offset-l3">
                                    <textarea name="title1" type="text" class="validate materialize-textarea charactercount" data-length="100"><?php echo $register["title1"] ?></textarea>
                                    <label for="title1">Titre (gauche)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="content1" type="text" class="validate materialize-textarea charactercount" data-length="900"><?php echo $register["content1"] ?></textarea>
                                    <label for="content1">Contenu (gauche)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 l6">
                            <div class="row">
                                <div class="input-field col s12 l6 offset-l3">
                                    <textarea name="title2" type="text" class="validate materialize-textarea charactercount" data-length="100"><?php echo $register["title2"] ?></textarea>
                                    <label for="title2">Titre (droite)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="content2" type="text" class="validate materialize-textarea charactercount" data-length="900"><?php echo $register["content2"] ?></textarea>
                                    <label for="content2">Contenu (droite)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="form-link" type="text" class="validate materialize-textarea charactercount" data-length="900"><?php echo $register["form-link"] ?></textarea>
                            <label for="form-link">Lien vers le Forms</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $register['id']; ?>">
                    <button class="btn blue accent-2" type="submit">Modifier</button>
                </form>
            </div>
        <?php } ?>

        <hr>


        <!-- footer content -->
        <h4 id="footer-edit">Pied de page</h4>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `footer-boxes` WHERE 1";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
            $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
            foreach ($boxes as $box) {
            ?>
                <div class="col s12 card">
                    <form method="post" action="queries/footer-box-update.php">

                        <div class="row ">
                            <div class="col s12 l6">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <textarea name="title1" type="text" class="validate materialize-textarea charactercount" data-length="60"><?php echo $box["title1"] ?></textarea>
                                        <label for="title1">Titre 1</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="content" type="text" class="validate materialize-textarea charactercount" data-length="300"><?php echo $box["content"] ?></textarea>
                                        <label for="content">Contenu</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l6">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <textarea name="title2" type="text" class="validate materialize-textarea charactercount" data-length="60"><?php echo $box["title2"] ?></textarea>
                                        <label for="title2">Titre 2</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <textarea name="email" type="email" class="validate materialize-textarea"><?php echo $box["email"] ?></textarea>
                                        <label for="email">Adresse Mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <textarea name="phone1" type="text" class="validate materialize-textarea" placeholder="0123456789"><?php echo "0" . $box["phone1"] ?></textarea>
                                        <label for="phone1">Téléphone 1</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <textarea name="phone2" type="text" class="validate materialize-textarea" placeholder="0123456789"><?php echo "0" . $box["phone2"] ?></textarea>
                                        <label for="phone2">Téléphone 2 (optionnel)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $box['id']; ?>">
                        <button class="btn blue accent-2" type="submit">Modifier</button>
                    </form>
                </div>
            <?php }; ?>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>