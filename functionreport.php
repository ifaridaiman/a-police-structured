<?php
session_start();
require('connect.php');
if (isset($_POST['casedate']) && isset($_POST['casetime'])) {
    //variable
    $userid = $_SESSION['id'];
    $date = $_POST['casedate'];
    $time = $_POST['casetime'];
    $location = $_POST['caselocation'];
    $desc = $_POST['casedescription'];
    $file = basename($_FILES["casefile"]["name"]);
    $progress = 0;

    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["casefile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["casefile"]["tmp_name"]);
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
    if ($_FILES["casefile"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        echo '<br>';
        echo $_FILES["casefile"]["size"];
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["casefile"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["casefile"]["name"]) . " has been uploaded.";
            $reportquery = "INSERT INTO report (reportdate, reporttime, description, reportLocation, reportEvidence, userID, progressID) VALUES ('$date','$time','$desc','$location','$file','$userid','$progress')";
            if (mysqli_query($connection, $reportquery)) {
                var_dump($reportquery);
                header('Location: user/inbox.php');
            } else {
                var_dump($reportquery);
                die('database access failed' . mysqli_error($connection));
            }
        } else {
            echo '<br>';
            echo $target_file;
            echo '<br>';
            echo var_dump(move_uploaded_file($_FILES["casefile"]["tmp_name"], $target_file));
            echo '<br>';
            echo $_FILES["casefile"]["name"];
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo 'problem';
}
