<!DOCTYPE html>
<html lang="fr">

<?php
require_once "config/config.php";
?>

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


<footer class="page-footer red lighten-3">
  <div class="container">
    <div class="row">
      <?php
      $sql = "SELECT * FROM `footer-boxes` WHERE 1";
      $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
      $pre->execute(); //on l'execute
      $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
      foreach ($boxes as $box) {
      ?>
        <div class="col l4 s12">
          <h5 class="white-text"><?php echo $box['title'] ?></h5>
          <p>
            <?php echo nl2br($box['content']) ?>
          </p>
        </div>
      <?php }; ?>

      <div class="col l4 s12 center">
        <img id="logo-footer" src="images/logo-maison-des-ptits-loups-la-seyne.svg" width="330px" height="150px" alt="Logo">
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © COM IT UP 2023 - tous droits réservés - LA MAISON DES PETITS LOUPS
    </div>
  </div>
</footer>