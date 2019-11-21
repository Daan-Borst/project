<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/config.php");
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
   }
$serverLink = mysqli_connect($host, $username, $password, $db);

if (isset($_POST['update_price'])) {
  $price = mysqli_real_escape_string($serverLink, $_POST['priceupdate']);
  $id = mysqli_real_escape_string($serverLink, $_POST['id']);

  if (count($errors) == 0) {

  	$query = "UPDATE products SET price='$price' WHERE id='$id'";
  	mysqli_query($serverLink, $query);
  	header('location: /productmanager');
	 }
	else {
    die();
	}
}