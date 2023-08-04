<!DOCTYPE html>
<html lang="fr">

<?php
require_once "components/head.php";
require_once "config/config.php";
?>

<body>
  <?php
  include 'components/nav.php';
  ?>

  <div class="container">
    <h2 class="center">L'actu des P'tits Loups</h2>
    <?php
    if (isset($_SESSION['user'])) {
      $sql = "SELECT * FROM `articles` JOIN `articles-access` ON `articles`.`id` = `articles-access`.`article-id` WHERE `articles-access`.`account-id` = 0 OR `articles-access`.`account-id` =" . $_SESSION['user']['id'] . " ORDER BY `articles`.`date` DESC";
    } else {
      $sql = "SELECT * FROM `articles` JOIN `articles-access` ON `articles`.`id` = `articles-access`.`article-id` WHERE `articles-access`.`account-id` = 0 ORDER BY `articles`.`date` DESC";
    }
    $pre = $pdo->prepare($sql); 
    $pre->execute();
    $data = $pre->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $article) {

      $date = date_create($article["date"]);


      $sql = "SELECT * FROM `articles-images` WHERE `article-id` =" . $article['id'];
      $pre = $pdo->prepare($sql); 
      $pre->execute(); 
      $articleimages = $pre->fetchAll(PDO::FETCH_ASSOC); 

      $imagecount = count($articleimages);
    ?>
      <hr>
      <div>
        <div class="row ">
          <span class="row">
            <div class="col s12 <?php if ($imagecount == 0) {
                                  echo 'center';
                                } else {
                                  echo 'm6';
                                } ?>">
              <h2 class="col s12 center"><?php echo $article["title"] ?></h2>
              <p class="col s12 ">Publié le <?php echo date_format($date, "d/m/Y") ?> </p>
              <p class="col s12 m8 offset-m2"><?php echo nl2br($article["content"]) ?></p>
            </div>
            <div class="col s12 m6 center">
              <?php
              if ($imagecount > 1) { ?>
                <div class="carousel carousel-slider">
                  <?php
                  foreach ($articleimages as $oneimage) {
                  ?>
                    <a class="carousel-item"><img class="responsive-img materialboxed" width="650" src="images/<?php echo $oneimage['filename'] ?>" alt="<?php echo $oneimage['filename'] ?>"></a>
                  <?php
                  };
                  ?>
                </div>
              <?php } else if ($imagecount == 1) { ?>
                <img class="materialboxed news-image" src="images/<?php echo $articleimages[0]['filename'] ?>">
              <?php
              };
              ?>
            </div>
          </span>
        </div>
      </div>

    <?php
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