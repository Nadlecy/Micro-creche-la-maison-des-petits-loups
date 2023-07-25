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