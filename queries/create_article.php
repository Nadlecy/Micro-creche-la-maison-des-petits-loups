
<?php
require_once "../config/config.php";

if (empty($_POST["title"])) {
    $_SESSION["error"] = "Titre invalide !";
} elseif (empty($_POST["content"])) {
    $_SESSION["error"] = "Contenu invalide !";
} elseif (empty($_POST["visibility"])) {
    $_SESSION["error"] = "Visibilité invalide !";
} else {


    $imagefilenames = array();

    // Process and save up to three chosen images
    for ($i = 1; $i <= 3; $i++) {
        $imageKey = "image" . $i;
        if (isset($_FILES[$imageKey]) && $_FILES[$imageKey]["error"] == UPLOAD_ERR_OK) {


            //databind for sql
            $dataBinded = array(
                ':filename' => $_FILES[$imageKey]["name"],
                ':tempname' => $_FILES[$imageKey]["tmp_name"]
            );

            // Move the uploaded file to a permanent location
            move_uploaded_file($dataBinded[':tempname'], "../images/" . $dataBinded[':filename']);

            // also make a concatenation of the filenames each turn, for ulterior ID selection
            array_push($imagefilenames, $dataBinded[':filename']);
            if ($imagefilenames == "") {
                $imagefilenames .= "\'" . $dataBinded[':filename'] . "\'";
            } else {
                $imagefilenames .= " OR \'" . $dataBinded[':filename'] . "\'";
            }
        }
    }

    //insert the article data into article
    $databinded = array(
        ':title' => $_POST["title"],
        ':content' => $_POST["content"],
        ':visibility' => $_POST["visibility"]
    );


    

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

    $accessId = $lastArticleId[0]['id'];

    // Handle recipients
    if ($_POST["visibility"] === "private") {
        // Get the selected recipients
        $recipients = $_POST["recipients"];

        // Insert recipients into the article_recipients 
    } else {
        // put the article as public
    }
}

?>