<?php
require_once "../config/config.php";

if (empty($_POST["email"])) {
    $_SESSION["error"] = "Adresse mail invalide !";
} elseif (empty($_POST["password"])) {
    $_SESSION["error"] = "Mot de passe invalide !";
} else {
    $sql = "SELECT * FROM accounts WHERE email=:email AND password=SHA1(:password)";
    $dataBinded = array(
        ':email' => $_POST['email'],
        ':password' => "NFSDJK5QLBFNDQ?KLQL122é('-(è-è_-_(@àç_è1F" . $_POST['password']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
    $user = $pre->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) { //vérifie si le resultat est vide !
        $_SESSION['error'] = "Email ou mot de passe incorrect !";
    } else {
        $_SESSION['user'] = $user; //on enregistre que l'utilisateur est connecté
    }
};
header('Location:../index.php'); //on le redirige sur la page d'accueil du site !
exit();
