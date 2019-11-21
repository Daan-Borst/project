
    <?php 
    require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navbar.php");
    ?>
<html>
    <head>
            <title><?php echo($WebName) ?> - Oops</title>
    </head>
    <body class="page-id-3">
		<center>
		<h1>Oops er ging iets fout!</h1>
		<h5>Sorry, u heeft voor de volgende acties geen toegang.</h5><br>
		</center>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_footer.php"); ?>
</body>
</html>
