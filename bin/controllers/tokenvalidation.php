<?php
include($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
   }
$serverLink = mysqli_connect($host, $username, $password, $db);
$currentdate = GETDATE();

if (isset($_POST['resettoken'])) {
		$email = mysqli_real_escape_string($serverLink, $_POST['email']);
		$password_1 = mysqli_real_escape_string($serverLink, $_POST['password']);
		$token = mysqli_real_escape_string($serverLink, $_POST['tokeninput']);

		$password_1e = substr($password_1,0,16);
		$id = mysqli_real_escape_string($serverLink, $_POST['email']);
		$sql = "SELECT * FROM users WHERE email = '$id'";
		$res = mysqli_query($serverLink, $sql);
		$getsql = mysqli_fetch_array($res,MYSQLI_ASSOC);
		$value = date("Y/m/d/l");
		$tokenvalidation = md5($getsql['pass'].$getsql['update_date'].$value);

	if($token == $tokenvalidation){
	
		$select = mysqli_query($serverLink, "SELECT * FROM users WHERE email = '$email'") or exit(mysqli_error($serverLink));
		if(mysqli_num_rows($select) == 1) {
			if (empty($password_1e) || empty($email)) {
				array_push($errors, "Error: Empty");
			}
		
			if (count($errors) == 0) {
				$regepassword = md5($password_1e);//encrypt the password before saving in the database
		
				$query = ("UPDATE users SET pass='$regepassword', update_date=CURRENT_TIMESTAMP WHERE email = '$email'");
				mysqli_query($serverLink, $query);
				header('location: /login');
			 }
			else {
				echo "Token is ongeldig";
			}
		}
	}
}
?>