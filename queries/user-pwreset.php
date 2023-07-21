<?php
require("../config/config.php");

if (isset($_POST['newpassword'])) {

    $sql = "UPDATE accounts SET password = :newPassword WHERE id = :userId";
    $dataBinded = array(
        ':userId'   => $_POST['userId'],
        ':newPassword' => SHA1("NFSDJK5QLBFNDQ?KLQL122é('-(è-è_-_(@àç_è1F" . $_POST['newpassword'])
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
    $data = $pre->fetch(PDO::FETCH_ASSOC);
}
header('Location: ../admin-accounts.php');
