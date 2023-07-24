
<?php
require_once "../config/config.php";

if (empty($_POST["title"])) {
    $_SESSION["error"] = "Titre invalide !";
} elseif (empty($_POST["content"])) {
    $_SESSION["error"] = "Contenu invalide !";
} else {

    // insert in articles
    $databinded = array(
        ':title' => $_POST["title"],
        ':content' => $_POST["content"]
    );
    $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute($databinded); //on l'execute

    //get the highest articles id, thus from the one that was just inserted
    $sql = "SELECT MAX(`id`) AS id FROM `articles` WHERE 1";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute(); //on l'execute
    $lastArticleIdArray = $pre->fetch(PDO::FETCH_ASSOC); // on stocke les données dans $articleImageIds
    $articleId = $lastArticleIdArray['id']; //on passe l'id dans $articleId
    echo "<br> article id is: " .$articleId ."<br>";

    if (isset($_FILES['upload']['name']) && $_FILES['upload']['name'] != "") {
        // insert in articles-images
        $files = array_filter($_FILES['upload']['name']); //remove empty uploads if there are any

        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        // Loop through each file
        for ($i = 0; $i < $total; $i++) {
            if ($_FILES['upload']['error'][$i] === UPLOAD_ERR_OK) {
                $_FILES["upload"]["name"][$i] = str_replace(" ", "", $_FILES["upload"]["name"][$i]);
                $_FILES["upload"]["name"][$i] = preg_replace('/[^A-Za-z0-9\-\'\\\.\:]/', '', $_FILES["upload"]["name"][$i]);

                $target_dir = "../images/";
                $target_file = $target_dir . $_FILES["upload"]["name"][$i];
                $uploadOk = 1;

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["upload"]["tmp_name"][$i]);
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
                if ($_FILES["upload"]["size"][$i] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file

                } else {
                    if (move_uploaded_file($_FILES["upload"]["tmp_name"][$i], $target_file)) {
                        echo "The file " . htmlspecialchars($_FILES["upload"]["name"][$i]) . " has been uploaded.";

                        //update the database
                        $sql = "INSERT INTO `articles-images` (`filename`, `article-id`) VALUES  (:newimage, :articleid)";
                        $dataBinded = array(
                            ':newimage' => $_FILES["upload"]["name"][$i],
                            ':articleid' => $articleId
                        );
                        $pre = $pdo->prepare($sql);
                        $pre->execute($dataBinded);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }

    // insert in access
    if ($_POST['visibility'] == 1) {

        //article will be displayed to the selected users
        foreach ($_POST['recipients'] as $recipient) {
            $databinded = array(
                ':articleid' => $articleId,
                ':accountid' => $recipient
            );
            $sql = "INSERT INTO `articles-access`(`account-id`, `article-id`) VALUES (:accountid, :articleid)";
            $pre = $pdo->prepare($sql);
            $pre->execute($databinded);
        }
    } else {

        //article will be displayed publically 
        $databinded = array(
            ':articleid' => $articleId,
            ':accountid' => 0
        );
        $sql = "INSERT INTO `articles-access`(`account-id`, `article-id`) VALUES (:accountid, :articleid)";
        $pre = $pdo->prepare($sql);
        $pre->execute($databinded);
    }
}

header('Location:../admin-blog.php')
?>
