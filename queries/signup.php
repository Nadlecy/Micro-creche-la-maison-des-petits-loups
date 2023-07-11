<?php 
require_once "../config/config.php"; 
if (empty($_POST["email"])){
    $_SESSION["error"]="Adresse mail invalide !";
}elseif (empty($_POST["password"])){
    $_SESSION["error"]="Mot de passe invalide !";
}else{
    $sql = "INSERT INTO `accounts`(`last_name`, `first_name`, `child_name`, `email`, `password`, `admin`) VALUES (:last_name,:first_name,:child_name,:email,:encoded_password,:yn_admin)";
    $dataBinded=array(
        ':last_name'=> $_POST['last_name'],
        ':first_name'=> $_POST['first_name'],
        ':child_name'=> $_POST['child_name'],
        ':email'   => $_POST['email'],
        ':encoded_password'=> SHA1("NFSDJK5QLBFNDQ?KLQL122é('-(è-è_-_(@àç_è1F".$_POST['password']),
        ':yn_admin' => $_POST['admin'],
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
};
header('Location: ../admin-accounts.php');
exit();
