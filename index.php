<?php
require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="fr">

<?php
require "components/head.php";
?>

<body>

  <div class="red lighten-2 top-bar center-align grey-text text-darken-2">
    La Maison des Petits Loups | Micro Crèche à La Seyne-sur-Mer, Var
  </div>

  <div class="main-title">
  </div>

  <?php
  require_once 'components/nav.php';
  ?>



  <div class="container center-align">
    <h1>La Maison Des Petits Loups</h1>
    <h3>Micro Crèche à La Seyne-sur-Mer, Var</h3>
  </div>

  <div class="container">
    <div class="row">
      <?php
      $sql = "SELECT * FROM `home-intro-boxes` WHERE 1";
      $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
      $pre->execute(); //on l'execute
      $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
      foreach ($boxes as $box) {
        if ($box['title'] != "") {
      ?>
          <div class="col s12 m4">
            <div class="card">
              <div class="card-image home-box-image">
                <img class="responsive-img" src=<?php echo 'images/' . $box['image'] ?>>
                <span class="card-title"><?php echo $box['title'] ?></span>
              </div>
              <div class="card-content home-box-content">
                <p><?php echo nl2br($box['content']) ?></p>
              </div>
            </div>
          </div>
      <?php
        }
      };
      ?>
    </div>
  </div>

  <div class="container">
    Actualité récente
  </div>

  <div>
    <div class="container">
      <div class="row">
        <div class="col s12 m8 offset-m2">
          <?php
          $sql = "SELECT * FROM `home-middle-boxes` WHERE 1";
          $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
          $pre->execute(); //on l'execute
          $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
          foreach ($boxes as $box) {
            if ($box['title'] != "") {
          ?>
              <div class="col s12 m6">
                <h4 class="center"><?php echo $box['title'] ?></h4>
                <div>
                  <p class="center"><?php echo nl2br($box['content']) ?></p>
                </div>
              </div>
          <?php
            }
          };
          ?>
        </div>
      </div>
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
      <?php
      ?>
    </div>
  </div>
  <?php
  include 'components/footer.php';
  ?>

  <!--JavaScript at end of body for optimized loading-->
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/script.js"></script>
</body>

</html>