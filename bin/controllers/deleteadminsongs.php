<?php
    include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
    include($_SERVER['DOCUMENT_ROOT']."/bin/session.php");

    if(!isset($_SESSION['username'])){header("location: /");}
    if($adminstate != 1){header("location: /403");die();}

    $serverLink = mysqli_connect($host, $username, $password, $db);

    if($adminstate == 1){
    // Check connection
    if (!$serverLink) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $requestid =$_REQUEST['id'];
    $deluser = "DELETE FROM songs WHERE id = '$requestid'"; 
    

    if (mysqli_query($serverLink, $deluser)) {
        echo "Record deleted successfully";
        header("location: /adminsongpanel");
    } else {
        echo "Error deleting record: " . mysqli_error($serverLink);
    }

mysqli_close($serverLink);
    }else{ header("location: /");}
?>