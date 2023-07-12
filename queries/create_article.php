
<?php
require_once "../config/config.php";

if (empty($_POST["title"])) {
    $_SESSION["error"] = "Titre invalide !";
} elseif (empty($_POST["content"])) {
    $_SESSION["error"] = "Contenu invalide !";
} elseif (empty($_POST["visibility"])) {
    $_SESSION["error"] = "Visibilité invalide !";
} else {


    $imagefilenames = "";

    // Process and save up to three chosen images
    for ($i = 1; $i <= 3; $i++) {
        $imageKey = "image" . $i;
        if (isset($_FILES[$imageKey]) && $_FILES[$imageKey]["error"] == UPLOAD_ERR_OK) {

            $filename = $_FILES[$imageKey]["name"];
            $tempname = $_FILES[$imageKey]["tmp_name"];

            //databind for sql
            $dataBinded = array(
                ':filename' => $_FILES[$imageKey]["name"],
            );

            // Move the uploaded file to a permanent location
            move_uploaded_file($tempname, "../images/" . $filename);

            // Insert image details into the database
            $sql = "INSERT INTO article_images (filename) VALUES :filename";
            $pre = $pdo->prepare($sql);
            $pre->execute($dataBinded);

            // also make a concatenation of the filenames each turn, for ulterior ID selection
            if ($imagefilenames == "") {
                $imagefilenames .= "\'" . $filename . "\'";
            } else {
                $imagefilenames .= " OR \'" . $filename . "\'";
            }
        }
    }

    //get the article_images Id's
    $sql = "SELECT `id` FROM `article_images` WHERE `filename` = ($imagefilenames) ";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute(); //on l'execute
    $articleImageIds = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $articleImageIds

    //insert the article data into article
    $dataBinded = array(
        ':title' => $_POST["title"],
        ':content' => $_POST["content"],
        ':visibility' => $_POST["visibility"]
    );

    //adding the different image id's to databinded
    foreach ($articleImageIds as $articleImageId) {
        array_push($databinded, $articleImageId["id"]);
    }

    //making the request string, which adapts according to the number of images
    $sql = "INSERT INTO articles (title, content, visibility";

    for ($i = 0; $i <= 2; $i++) {
        if (isset($databinded[$i])) {
            $idplus = $i + 1;
            $sql .= ", image" . $idplus;
        }
    }

    $sql .= ") VALUES (:title, :content, :visibility";

    for ($i = 0; $i <= 2; $i++) {
        if (isset($databinded[$i])) {
            $sql .= ", " . $databinded[$i];
        }
    }

    $sql .= ")";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute($databinded); //on l'execute

    //get the highest articles id, thus the newer one
    $sql = "SELECT MAX(`id`) FROM `articles` WHERE 1";
    $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
    $pre->execute(); //on l'execute
    $lastArticleId = $pre->fetchAll(PDO::FETCH_ASSOC); // on stocke les données dans $articleImageIds

    $accessId = 0;
    foreach ($lastArticleId as $lastId) {
        $accessId = $lastId['id'];
    }

    // Handle recipients
    if ($_POST["visibility"] === "private") {
        // Get the selected recipients
        $recipients = $_POST["recipients"];

        // Insert recipients into the article_recipients table
        foreach ($recipients as $recipientId) {
            $sql = "INSERT INTO article_recipients (article_id, account_id) VALUES (" . $accessId . ", " . $recipientId . ")";
            $pre = $pdo->prepare($sql); //on prévient la base de données qu'on va executer une requête
            $pre->execute(); //on l'execute
        }
    }
}

?>