<?php
require_once '../config/config.php';

$sql = "UPDATE `footer-boxes` SET `title1`=:newtitle1,`content`=:newcontent,`title2`=:newtitle2,`email`=:newemail,`phone1`=:newphone1,`phone2`=:newphone2 WHERE id = :boxid";

if($_POST['phone1'][0] == "0"){
    $_POST['phone1'] = substr($_POST['phone1'],1,10);
}

echo $_POST['phone2'];

if($_POST['phone2'][0] == "0"){
    $_POST['phone2'] = substr($_POST['phone2'],1,10);
}
echo $_POST['phone2'];


$dataBinded = array(
    ':boxid'   => intval($_POST['id']),
    ':newtitle1'   => $_POST['title1'],
    ':newtitle2'   => $_POST['title2'],
    ':newcontent'   => $_POST['content'],
    ':newemail'   => $_POST['email'],
    ':newphone1' => intval($_POST['phone1']),
    ':newphone2' => intval($_POST['phone2'])
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-text.php#footer-edit');
