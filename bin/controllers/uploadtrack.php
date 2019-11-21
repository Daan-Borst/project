<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
if(!isset($_SESSION['username']) || $modstate != 1){
    die();
}


if (isset($_POST['upload_song'])) {
    include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");

    $serverLink = mysqli_connect($host, $username, $password, $db);

    // IMG section
    $imgtarget_dir = ($_SERVER['DOCUMENT_ROOT']."/lib/user/track/image/".$id."/");
    if (!is_dir($imgtarget_dir)){
        mkdir($imgtarget_dir);      
    }
    $imguploaded_dir = "http://127.0.0.1/trackimage/".$id."/";
    $imgfile = $imguploaded_dir . basename($_FILES["imgToUpload"]["name"]);
    $imgtarget_file = $imgtarget_dir . basename($_FILES["imgToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imgtarget_file,PATHINFO_EXTENSION));

    // TRACK section
    $tracktarget_dir = ($_SERVER['DOCUMENT_ROOT']."/lib/user/track/song/".$id."/");
    if (!is_dir($tracktarget_dir)){
        mkdir($tracktarget_dir);      
    }
    $trackuploaded_dir = "http://127.0.0.1/track/".$id."/";
    $trackfile = $trackuploaded_dir . basename($_FILES["trackToUpload"]["name"]);
    $tracktarget_file = $tracktarget_dir . basename($_FILES["trackToUpload"]["name"]);
    $trackFileType = strtolower(pathinfo($tracktarget_file,PATHINFO_EXTENSION));

    $naam = mysqli_real_escape_string($serverLink, $_POST['trackname']);
    $author = mysqli_real_escape_string($serverLink, $_POST['author']);
    $genre = mysqli_real_escape_string($serverLink, $_POST['genre']);
    $beschrijving = mysqli_real_escape_string($serverLink, $_POST['description']);

    $image = $imgfile;
    $track = $trackfile;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
        $checktrack = filesize($_FILES["trackToUpload"]["tmp_name"]);
        if($check !== false && $checktrack !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            echo "File is an valid file - " . $checktrack["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Files are not valid";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($imgtarget_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 1;
    }
    if (file_exists($tracktarget_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imgToUpload"]["size"] > 10000000) {
        echo "Sorry, your image is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for an image.";
        $uploadOk = 0;
    }
    if($trackFileType != "mp3" && $trackFileType != "wav"
    && $trackFileType != "ogg" ) {
        echo "Sorry, track files can only be mp3, wav & ogg types.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your files where not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $imgtarget_file)) {
            echo "The file ". basename( $_FILES["imgToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your image.";
        }
        if (move_uploaded_file($_FILES["trackToUpload"]["tmp_name"], $tracktarget_file)) {
            echo "The file ". basename( $_FILES["trackToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your Trackfile.";
        }
    }

    if (empty($naam) || empty($author) || empty($genre) || empty($beschrijving) || empty($image) || empty($track)) {
        array_push($errors, "Empty!");
    }

    if (count($errors) == 0) {

    $query = "INSERT INTO songs (songname, author, genre, description, image, upload, uploaded_by) 
                VALUES('$naam', '$author', '$genre', '$beschrijving', '$image', '$track', '$id')";

        $serverLink = mysqli_connect($host, $username, $password, $db);

        if ($serverLink->query($query) === TRUE) {
            echo "Inserted into products successfully";
            header("location: /songpanel");
        } else {
            echo "Error inserting into table: " . $serverLink->error;
        }
    }
    else {
        echo('ERROR :'. mysqli_error($serverLink));
    }
} else {
    die();
}
?>