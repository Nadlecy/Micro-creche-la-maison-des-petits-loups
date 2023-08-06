<?php
require_once '../config/config.php';

$sql = "UPDATE `register-text` SET `form-link` = :newlink WHERE id = :boxid";
$dataBinded = array(
    ':boxid'   => intval($_POST['id']),
    ':newlink' => $_POST['form-link']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-text.php#register-edit');
