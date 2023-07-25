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
    <div class="container row">
      <div class="col s12 l6">
        fddfs
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