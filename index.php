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
    <h1>La Maison des P'tits Loups</h1>
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
          <div class="col s12 l4">
            <div class="card">
              <div class="card-image home-box-image">
                <img class="circle responsive-img" src=<?php echo 'images/' . $box['image'] ?>>
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
    <?php
    if (isset($_SESSION['user'])) {
      $sql = "SELECT * FROM `articles` JOIN `articles-images` ON `articles`.`id` = `articles-images`.`article-id` WHERE `articles`.`id`=( SELECT MAX(`articles-access`.`article-id`) FROM `articles-access` JOIN `articles-images` ON `articles-access`.`article-id` = `articles-images`.`article-id` WHERE `articles-access`.`account-id` =" . $_SESSION['user']['id'] . " OR `articles-access`.`account-id` =0 ) LIMIT 0,1";
    } else {
      $sql = "SELECT * FROM `articles` JOIN `articles-images` ON `articles-images`.`article-id`= `articles`.`id` WHERE `articles`.`id`= (SELECT MAX(`article-id`) FROM `articles-images` WHERE 1) AND `visibility`=0 LIMIT 0,1";
    }

    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute(); //on l'execute
    $recentarticle = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
    foreach ($recentarticle as $article) {
    ?>
      <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row news-display-box valign-wrapper">
          <div class="col s12 l6 news-display center">
            <img class="materialboxed" src="images/<?php echo $article['filename'] ?>">
          </div>
          <div class="col s12 l6 center">
            <h3>En ce moment :<br><?php echo $article['title'] ?></h3>
            <p><?php echo nl2br($article['content']) ?></p>
            <a href="blog.php">Voir plus</a>
          </div>
        </div>
      </div>
    <?php
    };
    ?>
  </div>

  <div class="row">
    <?php
    $sql = "SELECT * FROM `home-middle-boxes` WHERE 1";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute(); //on l'execute
    $boxes = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
    foreach ($boxes as $box) {
      if ($box['title'] != "") {
    ?>
        <div class="col s12 l4">
          <div class="row">
            <div class="col s12 l8 offset-l2">
              <h4 class="center"><b><?php echo $box['title'] ?></b></h4>
              <div>
                <p class="center"><?php echo nl2br($box['content']) ?></p>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    };
    ?>
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