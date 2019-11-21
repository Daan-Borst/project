<?php
    function getplaylists()
    {
        include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
        $serverLink = mysqli_connect($host, $username, $password, $db);
        $ret = array();
        $playlists_sql = "SELECT * FROM playlist";
        $sqlplaylists = mysqli_query($serverLink, $playlists_sql);

        while($playlists = mysqli_fetch_assoc($sqlplaylists))
        {
            $arrayplaylists[] = $playlists;
        }
        return $arrayplaylists;
    }
?>