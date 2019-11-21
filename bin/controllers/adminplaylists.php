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
    <body class="page-id-3">
        <h1 class="FloatL">Playlists</h1>
        <table style="width:100%">
            <tr>
            <th>ID</th>
                <th>Image</th>
                <th>Author</th> 
                <th>Genre</th>
                <th>Description</th>
                <th>Upload_Date</th>
                <th>Delete</th>
            </tr>
            <?php require($_SERVER['DOCUMENT_ROOT']."/bin/controllers/getadminplaylistsloop.php");?>
            </table>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_footer.php"); ?>
</body>
</html>
