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


  <?php if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 1) { ?>
    <div class="row">
      <div class="col s12 m2 offset-m8">
        <a class="btn" href="admin-accounts.php">Admin</a>
      </div>
    </div>
  <?php } ?>

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
    <div class=" container">
      La maison est ouverte:
      Du lundi au vendredi
      De 7h30 à 18h00


      Nous ne sommes pas disponibles :

      1 semaine au printemps
      3 semaines l'été
      1 semaine entre Noël et Jour de l'An
      Ainsi que le vendredi suivant le jeudi de l'Ascension.

      Qui sommes-nous ?

      Un Cap petite enfance 6 ans d'expérience petite enfance sera présente, en appui avec une éducatrice de jeunes enfants intervenant 3h par mois.
      Une éducatrice de jeunes enfants (licence psycho) pour l'analyse de la pratique.
      Trois professionnel(le)s de la Petite Enfance titulaires d'un CAP, relevant de l'arrêté ministériel du 26 décembre 2000, modifié par l'arrêté ministériel du 3 décembre 2018, relatif au personnel des établissements participants à l'encadrement des enfants de moins de 6ans.

      Toutes seront à votre écoute et à votre disposition pour toutes questions que vous poserez,
      Partageront leur savoir-faire et leur savoir-être et prendront plaisir à s'occuper de vos « P'tits Loups » dans la joie et la bonne humeur !

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