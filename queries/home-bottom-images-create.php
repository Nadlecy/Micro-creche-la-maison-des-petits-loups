
<?php
require_once "../config/config.php";

if (empty($_POST["caption"])) {
    $_SESSION["errorbottom"] = "Légende invalide !";
} elseif (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {

    $_FILES["image"]["name"] = str_replace(" ", "", $_FILES["image"]["name"]);
    $_FILES["image"]["name"] = preg_replace('/[^A-Za-z0-9\-\'\\\.\:]/', '', $_FILES["image"]["name"]);

    $target_dir = "../images/";
    $target_file = $target_dir .$_FILES["image"]["name"];
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $_SESSION["errorbottom"] = "Image invalide !";
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        $_SESSION["errorbottom"] = "Changez le nom du fichier.";
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        $_SESSION["errorbottom"] = "Fichier trop large.";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            //update the database
            $sql = "INSERT INTO `inside-images`(`filename`, `caption`) VALUES (:newimage, :caption)";
            $dataBinded = array(
                ':caption'   => $_POST['caption'],
                ':newimage' => $_FILES["image"]["name"]
            );
            $pre = $pdo->prepare($sql);
            $pre->execute($dataBinded);
        } else {
            $_SESSION["errorbottom"] = "Une erreur inattendue est survenue.";
        }
    }
} else {
    $_SESSION["errorbottom"] = "Image invalide !";
}

header('Location:../admin-text.php#home-bottom-edit');
