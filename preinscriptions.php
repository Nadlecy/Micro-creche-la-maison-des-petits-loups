<!DOCTYPE html>
<html lang="fr">

<?php
require_once "components/head.php";
require_once "config/config.php";
?>

<body>
  <?php
  include 'components/nav.php';


  $sql = "SELECT * FROM `register-text`";
  $pre = $pdo->prepare($sql);
  $pre->execute();
  $registerpagecontent = $pre->fetchAll(PDO::FETCH_ASSOC);
  foreach ($registerpagecontent as $register) {
  ?>

    <div class="container center">
      <h2>Préinscription</h2>
    </div>

    <div class="container row">
      <div class="col s12 l6">
        <h3><?php echo $register['title1'] ?></h3>
        <p><?php echo $register['content1'] ?></p>
      </div>
      <div class="col s12 l6">
        fddfs
      </div>
    </div>
  <?php
  }
  include 'components/footer.php';
  ?>
  <!--JavaScript at end of body for optimized loading-->
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/script.js"></script>
</body>