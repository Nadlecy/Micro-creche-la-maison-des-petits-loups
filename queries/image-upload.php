<?php
require("../config/config.php");

if (isset($_POST['imageSubmit'])) {
    $fileName = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];

    // Move uploaded file to the desired location
    $uploadPath = $uploadDir . $fileName;
    if (move_uploaded_file($fileTmp, $uploadPath)) {
        // Register the file name in the database
        $insertQuery = "INSERT INTO pictures (filename) VALUES ('$fileName')";
        $mysqli->query($insertQuery);
        if ($mysqli->affected_rows > 0) {
            echo "Image uploaded successfully.";
        } else {
            echo "Failed to insert into database.";
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>