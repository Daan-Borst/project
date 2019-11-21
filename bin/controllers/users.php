<?php
    function getusers()
    {
        include($_SERVER['DOCUMENT_ROOT']."/bin/config.php");
        $serverLink = mysqli_connect($host, $username, $password, $db);
        $ret = array();
        $product_sql = "SELECT * FROM users";
        $res = mysqli_query($serverLink, $product_sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
    }
?>