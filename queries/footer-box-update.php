<?php
require_once '../config/config.php';

$sql = "UPDATE `footer-boxes` SET title = :newtitle, content = :newcontent WHERE id = :boxid";
$dataBinded = array(
    ':boxid'   => intval($_POST['id']),
    ':newtitle'   => $_POST['title'],
    ':newcontent'   => $_POST['content']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-text.php#footer-edit');
