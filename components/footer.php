<!DOCTYPE html>
<html lang="fr">

<?php
require_once "head.php";
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


<footer class="page-footer red lighten-2">
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
          <h5 class="white-text"><?php echo $box['title1'] ?></h5>
          <p>
            <?php echo nl2br($box['content']) ?>
          </p>
        </div>
        <div class="col l4 s12">
          <h5 class="white-text"><?php echo $box['title2'] ?></h5>
          <p>Tél: <a href="tel:+33<?php echo $box['phone1'] ?> "><u><?php echo "0" . $box['phone1'] ?></u></a>
            <?php if (isset($box['phone2']) && $box['phone2'] != 0) { ?>
              ou <a href="tel:+33<?php echo $box['phone2'] ?> "><u><?php echo "0" . $box['phone2'] ?></u></a>
            <?php }; ?>
            <br>
            Mail: <a href="mailto:<?php echo $box['email'] ?>"><u><?php echo $box['email'] ?></u></a>
          </p>
        </div>

        <div class="col l4 s12 mobile-show">
          <h5>Joignables ici</h5>
          <p class="mobile-contact" ><a href="tel:+33<?php echo $box['phone1'] ?> "><i class="large material-icons">phone</i></a>
            <?php if (isset($box['phone2']) && $box['phone2'] != 0) { ?>
              <a href="tel:+33<?php echo $box['phone2'] ?> "><i class="large material-icons">phone_iphone</i></a>
            <?php }; ?>
            <a href="mailto:<?php echo $box['email'] ?>"><i class="large material-icons">mail</i></a>
          </p>
        </div>

      <?php }; ?>

      <div class="col l4 s12 center">
        <img id="logo-footer" src="images/logo-maison-des-ptits-loups-la-seyne.svg" width="330px" height="150px" alt="Logo">
      </div>
    </div>
  </div>
  <div class="footer-copyright red-text text-darken-2">
    <div class="container">
      <b>La Maison des P'tits Loups</b> | SIRET : 75137073500027 | RNA : W832009446 | Réalisé par : <a href="mailto:bcleymand@gmail.com"><u>Bruno CLEYMAND</u></a> aidé par l'<a href="https://comitup.fr/" target="_blank" rel="external" download><u>Agence COM IT UP</u></a>
    </div>
  </div>
</footer>