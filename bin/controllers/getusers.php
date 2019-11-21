<?php
    function getusers()
    {
        include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
        $serverLink = mysqli_connect($host, $username, $password, $db);
        $ret = array();
        $users_sql = "SELECT * FROM users";
        $sqlusers = mysqli_query($serverLink, $users_sql);

        while($users = mysqli_fetch_assoc($sqlusers))
        {
            $arrayusers[] = $users;
        }
        return $arrayusers;
    }
?>