<?php
require("../config/config.php");

$sql = "SELECT * FROM accounts WHERE id = :userId";
$dataBinded=array(
    ':userId'   => $_POST['userId']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);
$data = $pre->fetch(PDO::FETCH_ASSOC);

if ($data['admin'] == 0){
    $sql = "UPDATE accounts SET admin = 1 WHERE id = :userId";
    $dataBinded=array(
        ':userId'   => $_POST['userId']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}else{
    $sql = "UPDATE accounts SET admin = 0 WHERE id = :userId";
    $dataBinded=array(
        ':userId'   => $_POST['userId']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
};
header('Location: ../admin-accounts.php');
?>