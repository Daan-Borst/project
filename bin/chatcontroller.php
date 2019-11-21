<?php
    function getmessages()
    {
        include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
        $serverLink = mysqli_connect($host, $username, $password, $db);
        $ret = array();
        $chat_sql = "SELECT * FROM chat";
        $res = mysqli_query($serverLink, $chat_sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
    }

    if (isset($_POST['chat'])) {
        $text = mysqli_real_escape_string($serverLink, $_POST['chatinput']);
        $name = $_SESSION['username'];
    
        if (empty($name)) {
            array_push($errors, "Empty Error");
        }
        if (count($errors) == 0) {
            $query = "INSERT INTO chat (name, text) 
  			VALUES('$name', '$text')";
  	        mysqli_query($serverLink, $query);
        } else {
            die();
        }
    }
?>