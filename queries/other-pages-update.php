<?php
require_once '../config/config.php';

$sql = "UPDATE `other-pages` SET `main-title`=:newmain, `under-title1`=:newtitle1, `under-title2`=:newtitle2, `content1`=:newcontent1, `content2`=:newcontent2 WHERE `id`=:pageid";
$dataBinded = array(
    ':pageid'   => intval($_POST['id']),
    ':newmain' => $_POST['main-title'],
    ':newtitle1'   => $_POST['under-title1'],
    ':newcontent1'   => $_POST['content1'],
    ':newtitle2'   => $_POST['under-title2'],
    ':newcontent2'   => $_POST['content2']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-text.php#otherpages');
