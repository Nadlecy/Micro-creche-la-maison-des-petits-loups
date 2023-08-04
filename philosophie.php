<!DOCTYPE html>
<html lang="fr">

<?php
require_once "components/head.php";
require_once "config/config.php";
?>

<body>
  <?php
  include 'components/nav.php';


  $sql = "SELECT * FROM `other-pages` WHERE `id`=1";
  $pre = $pdo->prepare($sql);
  $pre->execute();
  $pagecontents = $pre->fetchAll(PDO::FETCH_ASSOC);
  foreach ($pagecontents as $page) {
  ?>

    <div class="container center">
      <h2><?php echo $page['main-title'] ?></h2>
    </div>

    <div class="container row">
      <div class="col s12 l8 offset-l2">
        <h3><?php echo $page['under-title1'] ?></h3>
        <p><?php echo nl2br($page['content1']) ?></p>
        <h3><?php echo $page['under-title2'] ?></h3>
        <p><?php echo nl2br($page['content2']) ?></p>
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