<?php
require_once '../config/config.php';

if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {

    $_FILES["image"]["name"] = str_replace(" ", "", $_FILES["image"]["name"]);

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            //delete the previous image
            $sql = "SELECT `image` FROM `home-intro-boxes` WHERE id = :boxid";
            $dataBinded = array(
                ':boxid'   => intval($_POST['id'])
            );
            $pre = $pdo->prepare($sql);
            $pre->execute($dataBinded);
            $oldimage = $pre->fetch(PDO::FETCH_ASSOC);

            if (file_exists("../images/" . $oldimage['image'])) {
                unlink("../images/" . $oldimage['image']);
            };

            //update the database
            $sql = "UPDATE `home-intro-boxes` SET title = :newtitle, content = :newcontent, image = :newimage WHERE id = :boxid";
            $dataBinded = array(
                ':boxid'   => intval($_POST['id']),
                ':newtitle'   => $_POST['title'],
                ':newcontent'   => $_POST['content'],
                ':newimage' => $_FILES["image"]["name"]
            );
            $pre = $pdo->prepare($sql);
            $pre->execute($dataBinded);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {

    $sql = "UPDATE `home-intro-boxes` SET title = :newtitle, content = :newcontent WHERE id = :boxid";
    $dataBinded = array(
        ':boxid'   => intval($_POST['id']),
        ':newtitle'   => $_POST['title'],
        ':newcontent'   => $_POST['content']
    );
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);

    echo "no image";
}
header('Location:../admin-text.php');