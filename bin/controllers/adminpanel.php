    <?php 
    require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navbar.php");
    if($adminstate != 1){
        header('location: /403 ');
        die();
    }
    ?>
<html>
    <head>
            <title><?php echo($WebName) ?> - AdminPaneel</title>
    </head>
    <body class="page-id-2">
		<center>
        <h1>Adminpanel</h1>
        <div class="wrapped">
            <div class="consolewrapper">
                <div class="acontainer">
                    <a class="none2" href="/modpanel"><br/>
                        <h3 class="bpadding">ModPanel</h3>
                        <h6 class="whitespace">Ga naar het <br/> mod paneel.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/adminuserpanel"><br/>
                        <h3 class="bpadding">UserPanel</h3>
                        <h6 class="whitespace">Ga naar het <br/> user paneel.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/adminsongpanel"><br/>
                        <h3 class="bpadding">SongPanel</h3>
                        <h6 class="whitespace">Ga naar het <br/> liederen paneel.</h6>
                    </a>
                </div>
                <div class="acontainer">
                    <a class="none2" href="/adminplaylistpanel"><br/>
                        <h3 class="bpadding">PlayListPanel</h3>
                        <h6 class="whitespace">Ga naar het <br/> playlist paneel.</h6>
                    </a>
                </div>
            </div>
        </div>
		</center>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_footer.php"); ?>
</body>
</html>
