<?php
require("../config/config.php");

echo $_POST['userId'];
$sql = "SELECT * FROM accounts WHERE id = :userId";
$dataBinded=array(
    ':userId'   => $_POST['userId']
);

$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);
$data = $pre->fetch(PDO::FETCH_ASSOC);

$sql = "DELETE FROM accounts WHERE id = :userId";
$dataBinded=array(
    ':userId'   => $_POST['userId']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

header('Location:../admin-accounts.php');
?>