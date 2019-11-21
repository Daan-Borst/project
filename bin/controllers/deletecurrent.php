<?php
    include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
    include($_SERVER['DOCUMENT_ROOT']."/bin/session.php");

    if(!isset($_SESSION['username'])){header("location: /");}

    $serverLink = mysqli_connect($host, $username, $password, $db);

    if(isset($_SESSION['username'])){
    // Check connection
    if (!$serverLink) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $requestid = $array['id'];
    $request_sql = mysqli_query($serverLink,"SELECT * FROM users WHERE id = '$requestid' ");
    $admin_sql = mysqli_query($serverLink,"SELECT * FROM administration WHERE iduser = '$requestid' ");
    $fetchrequest_sql = mysqli_fetch_array($request_sql,MYSQLI_ASSOC);
    $adminfetch = mysqli_fetch_array($admin_sql,MYSQLI_ASSOC);
    $fetchedname = $fetchrequest_sql['name'];
    $isadminstate = $adminfetch['isadmin'];
    if($isadminstate == 1){
        echo 'Error : Cannot delete administrators'; die();
    }

    $trackimgdir = (($_SERVER['DOCUMENT_ROOT']."/lib/user/track/image/").$requestid);
    $trackdir = (($_SERVER['DOCUMENT_ROOT']."/lib/user/track/song/").$requestid);
    if (is_dir($trackimgdir) && is_dir($trackdir)){
        mkdir($trackimgdir);
        mkdir($trackdir);         
    }
    $deluser = "DELETE FROM users WHERE id = '$requestid'"; 
    $delsongs = "DELETE FROM songs WHERE uploaded_by = '$requestid'";
    $delchat = "DELETE FROM chat WHERE name = '$fetchedname'";
    

    if (mysqli_query($serverLink, $deluser)) {
        echo "Record deleted successfully";
        mysqli_query($serverLink, $delsongs);
        mysqli_query($serverLink, $delchat);
        session_destroy();
        header("location: /");
    } else {
        echo "Error deleting record: " . mysqli_error($serverLink);
    }

mysqli_close($serverLink);
    }else{ header("location: /");}
?>