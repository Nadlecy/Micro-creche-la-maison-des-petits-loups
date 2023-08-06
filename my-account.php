<?php
require_once 'config/config.php';

//only let people look at this page if they are connected
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
require "components/head.php";
?>

<body>

    <div id="pagesized">
        <?php
        include 'components/nav.php';
        ?>


        <?php
        $sql = "SELECT `id`, `last_name`, `first_name`, `child_name`, `email` FROM `accounts` WHERE 1";
        $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
        $pre->execute(); //on l'execute
        $data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
        foreach ($data as $userData) {
        ?>
            <div class="container center">
                <h2>Mon Compte</h2>
            </div>

            <div class="container row">
                <div class="col s12 l8 offset-l2">
                    <h3>Informations générales</h3>
                    <p><?php echo nl2br($page['content1']) ?></p>
                    <h3><?php echo $page['under-title2'] ?></h3>
                    <p><?php echo nl2br($page['content2']) ?></p>
                </div>
            </div>

        <?php
        }
        include 'components/footer.php';
        ?>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/script.js"></script>
</body>