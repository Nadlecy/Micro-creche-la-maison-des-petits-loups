<?php
require_once "../config/config.php";

$deletingid = $_POST['id'];

//get image names from the article and delete each of them
$sql = "SELECT * FROM `articles-images` WHERE `article-id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute
$data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
foreach ($data as $oldimage) {
    if (file_exists("../images/" . $oldimage['filename'])) {
        unlink("../images/" . $oldimage['filename']);
    };
};

//removing all images
$sql = "DELETE FROM `articles-images` WHERE `article-id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute

//removing all access
$sql = "DELETE FROM `articles-access` WHERE `article-id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute

//removing the article itself
$sql = "DELETE FROM `articles` WHERE `id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute

header('Location:../admin-blog.php');