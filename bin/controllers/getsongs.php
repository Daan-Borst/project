<?php
    function getsongs()
    {
        include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
        $serverLink = mysqli_connect($host, $username, $password, $db);
        $ret = array();
        $songs_sql = "SELECT * FROM songs";
        $sqlsong = mysqli_query($serverLink, $songs_sql);

        while($songs = mysqli_fetch_assoc($sqlsong))
        {
            $arraysongs[] = $songs;
        }
        return $arraysongs;
    }
?>