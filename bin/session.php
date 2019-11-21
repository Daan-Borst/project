<?php
    include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
   if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
   }
  
   if(isset($_SESSION['username'])){

   $serverLink = mysqli_connect($host, $username, $password, $db);
   $user_check = $_SESSION['username'];
   $ses_sql = mysqli_query($serverLink,"SELECT * FROM users WHERE name = '$user_check' ");
   $array = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $user = $array['name'];
   $useremail = $array['email'];
   $birth = $array['birth'];
   $id = $array['id'];


   $admin_sql = mysqli_query($serverLink,"SELECT * FROM administration WHERE iduser = '$id' ");
   $adminarray = mysqli_fetch_array($admin_sql,MYSQLI_ASSOC);
   
   $adminstate = $adminarray['isadmin'];
   $modstate = $adminarray['ismod'];
   }

?>