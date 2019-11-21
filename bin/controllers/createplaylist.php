<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
if(!isset($_SESSION['username'])){
    header("location: /login");
}

$author = $_SESSION['username'];
if (isset($_POST['create_playlist'])) {
    include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");

    $serverLink = mysqli_connect($host, $username, $password, $db);

    // IMG section
    $imgtarget_dir = ($_SERVER['DOCUMENT_ROOT']."/lib/user/playlist/image/".$id."/");
    if (!is_dir($imgtarget_dir)){
        mkdir($imgtarget_dir);      
    }
    $imguploaded_dir = "http://127.0.0.1/playlistimage/".$id."/";
    $imgfile = $imguploaded_dir . basename($_FILES["imgToUpload"]["name"]);
    $imgtarget_file = $imgtarget_dir . basename($_FILES["imgToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imgtarget_file,PATHINFO_EXTENSION));

    $naam = mysqli_real_escape_string($serverLink, $_POST['playlistname']);
    $genre = mysqli_real_escape_string($serverLink, $_POST['genre']);
    $beschrijving = mysqli_real_escape_string($serverLink, $_POST['description']);

    $image = $imgfile;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not valid";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($imgtarget_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 1;
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
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file is not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $imgtarget_file)) {
            echo "The file ". basename( $_FILES["imgToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your image.";
        }
    }

    if (empty($naam) || empty($author) || empty($genre) || empty($beschrijving) || empty($image)) {
        array_push($errors, "Empty!");
    }

    if (count($errors) == 0) {


    $query = "INSERT INTO playlist (name, image, author, genre, description) 
                VALUES('$naam', '$image', '$author', '$genre', '$beschrijving')";

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

}
?>