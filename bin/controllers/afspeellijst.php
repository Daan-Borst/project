<?php 
$serverLink = mysqli_connect($host, $username, $password, $db);

$select = mysqli_query($serverLink, "SELECT * FROM playlist WHERE author = '$user'");
if($select == false) {
    echo '<script>function createplaylist(){window.location = "/createplaylist";}</script>';
    echo '<center><img alt="muzieknoot" src="/asset/afb/muzieknoot.png"><H1>Voeg uw eerste afspeellijst toe</H1><br><button onclick="createplaylist()">Maak uw afspeellijst</button></center>';
} else {
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_playlist.xml");
}

?>