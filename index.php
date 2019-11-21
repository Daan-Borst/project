
    <?php 
    require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navbar.php");

    ?>
<html>
    <head>
            <title><?php echo($WebName) ?> - Home</title>
    </head>
    <body class="page-id-1">
		<center>
		<h1>Muziek voor iedereen!</h1>
		<h5>Royality free muziek luisteren.</h5><br/>
		<br/>
		<a href="/webplayer">Begin nu met luisteren.</a>
		</center>

        <?php if(isset($_SESSION['username'])){include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_chatcontainer.php");} ?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_footer.php"); ?>

</body>
</html>
