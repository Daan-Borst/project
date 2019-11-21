<?php 
    require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navbar.php");
    if($modstate != 1){
        header('location: /403 ');
        die();
    }
    ?>
<html>
    <head>
            <title><?php echo($WebName) ?> - ArtistPanel</title>
    </head>
    <body class="page-id-2">
		<center>
        <h1>Welkom <?php echo $_SESSION['username'];?></h1>
        <div class="wrapped">
            <div class="consolewrapper">
                <div class="acontainer">
                <a class="none2" href="/uploadsong"><br/>
                        <h3 class="bpadding">Song Upload</h3>
                        <h6 class="whitespace">Upload een nieuwe <br/> track.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/artistpanel"><br/>
                        <h3 class="bpadding">User Panel</h3>
                        <h6 class="whitespace">Ga naar het <br/> gebruikers paneel.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/songpanel"><br/>
                        <h3 class="bpadding">Song Editor</h3>
                        <h6 class="whitespace">Bewerk uw <br/> tracks.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/songpanel"><br/>
                        <h3 class="bpadding">PlayList Editor</h3>
                        <h6 class="whitespace">Bewerk of Verwijder <br/> playlists.</h6>
                    </a>
                </div>
            </div>
        </div>
		</center>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_footer.php"); ?>
</body>
</html>
