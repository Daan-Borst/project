<!DOCTYPE html>
<?php 
    require($_SERVER['DOCUMENT_ROOT']."/bin/session.php");
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navplayer.php");
?>
<html lang="en">
<head>
  <title><?php echo($WebName) ?> - WebPlayer</title>
</head>
<body id="page-id-69">
<div class="cloudwrapper">
	<div class="container3">
		<div id="afspeellijst">
			<?php require($_SERVER['DOCUMENT_ROOT']."/bin/controllers/afspeellijst.php"); ?>
		</div>
	</div>
	</div>
  </body>
</html>