<?php
require_once '../config/config.php';

$sql = "UPDATE `register-text` SET title1 = :newtitle1, content1 = :newcontent1, title2 = :newtitle2, content2 = :newcontent2, `form-link` = :newlink WHERE id = :boxid";
$dataBinded = array(
    ':boxid'   => intval($_POST['id']),
    ':newtitle1'   => $_POST['title1'],
    ':newcontent1'   => $_POST['content1'],
    ':newtitle2'   => $_POST['title2'],
    ':newcontent2'   => $_POST['content2'],
    ':newlink' => $_POST['form-link']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-text.php#register-edit');
