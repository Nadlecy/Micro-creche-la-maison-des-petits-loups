<?php
require_once "../config/config.php";

$deletingid = $_POST['id'];

//get image name from the database and delete each of them
$sql = "SELECT * FROM `inside-images` WHERE `id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute
$data = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $data
foreach ($data as $oldimage) {
    if (file_exists("../images/" . $oldimage['filename'])) {
        unlink("../images/" . $oldimage['filename']);
    };
};

//removing the image from database
$sql = "DELETE FROM `inside-images` WHERE `id` =" . $deletingid;
$pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
$pre->execute(); //on l'execute

header('Location:../admin-text.php#home-bottom-edit');