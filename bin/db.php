<?php
require($_SERVER['DOCUMENT_ROOT']."/bin/config/config.php");

session_start();
$serverLink = mysqli_connect($host, $username, $password, $db);

if (isset($_POST['register_user'])) {
  $email = mysqli_real_escape_string($serverLink, $_POST['email']);
  $username = mysqli_real_escape_string($serverLink, $_POST['username']);
  $day = mysqli_real_escape_string($serverLink, $_POST['day']);
  $month = mysqli_real_escape_string($serverLink, $_POST['month']);
  $year = mysqli_real_escape_string($serverLink, $_POST['year']);
  $gender = mysqli_real_escape_string($serverLink, $_POST['gender']);
  $password_1 = mysqli_real_escape_string($serverLink, $_POST['password']);
  $password_1e = substr($password_1,0,16);
  $dateofbirth = ($day."/".$month."/".$year);

  $select = mysqli_query($serverLink, "SELECT * FROM users WHERE email = '$email'") or exit(mysqli_error($serverLink));
	if(mysqli_num_rows($select) == 1) {
		array_push($errors, "Error 1");
	}
  $selecte = mysqli_query($serverLink, "SELECT * FROM users WHERE name = '$username'") or exit(mysqli_error($serverLink));
	if(mysqli_num_rows($selecte) == 1) {
		array_push($errors, "Error 1");
	}
	if (empty($email) || empty($username) || empty($day) || empty($month) || empty($year) || empty($gender) || empty($password_1) || empty($dateofbirth)) {
		array_push($errors, "Empty error");
	}

  if (count($errors) == 0) {
  	$hashed = md5($password_1e);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (email, pass, name, birth, gender) 
  			  VALUES('$email', '$hashed', '$username', '$dateofbirth', '$gender')";
  	mysqli_query($serverLink, $query);
  	$_SESSION['username'] = $username;
  	header('location: /login '); //NAAR USER INTERFACE!
	 }
	else {
		die();
	}
}

//login
if (isset($_POST['login_user'])) {
	$useremail = mysqli_real_escape_string($serverLink, $_POST['username/email']);
	$password_1 = mysqli_real_escape_string($serverLink, $_POST['password']);
  
	if (empty($password_1) || empty($useremail)) {
		array_push($errors, "Empty Error");
	}
	if (count($errors) == 0) {
		$hashed = md5($password_1);

		$tryemail = "SELECT * FROM users WHERE email = '$useremail' and pass = '$hashed'";
		$tryusername = "SELECT * FROM users WHERE name = '$useremail' and pass = '$hashed'";

		$resultemail = mysqli_query($serverLink, $tryemail);
		$resultusername = mysqli_query($serverLink, $tryusername);

		$rowemail = mysqli_fetch_array($resultemail,MYSQLI_ASSOC);
		$rowusername = mysqli_fetch_array($resultusername,MYSQLI_ASSOC);

		$activeemail = $rowemail['active'];
		$activeusername = $rowusername['active'];

		$countemail = mysqli_num_rows($resultemail);
		$countusername = mysqli_num_rows($resultusername);

		if ($countemail == 1) {
			$tryemail = "SELECT name FROM users WHERE email = '$useremail'";
			$resultemail = mysqli_query($serverLink, $tryemail);
			$array = mysqli_fetch_array($resultemail,MYSQLI_ASSOC);
		  	$_SESSION['username'] = $array['name'];
			if(isset($_SESSION['username'])){
				header('location: /');
				die();
			}
		}	else if ($countusername == 1) {
			$tryusername = "SELECT name FROM users WHERE name = '$useremail'";
			$resultusername = mysqli_query($serverLink, $tryusername);
			$array = mysqli_fetch_array($resultusername,MYSQLI_ASSOC);
			$_SESSION['username'] = $array['name'];
			if(isset($_SESSION['username'])){
				header('location: /');
				die();
			}
		}
	}
}

//sendtoken
if(isset($_POST['sendresettoken'])) {
	$username = mysqli_real_escape_string($serverLink, $_POST['email']);
	$to = $username;
	$sql = "SELECT * FROM users WHERE email = '$username'";
	$res = mysqli_query($serverLink, $sql);
	$getsql = mysqli_fetch_array($res,MYSQLI_ASSOC);
	$value = date("Y/m/d/l");
	$token = md5($getsql['pass'].$getsql['update_date'].$value);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Bekijk het gegeven email voor een reset token.";
		$txt = "Verzoek ontvangen om uw wachtwoord te veranderen (De gegeven code is alleen vandaag geldig!). Heeft u dit niet aangevraagd negeer dan deze mail."." http:/".$Domain."/resetuser?token=".$token."&onuser=".$username ;
		$msg = wordwrap($txt,70);
		mail($to,"Wachtwoord Resetten",$msg,"From: ROC-WebDevelopment@outlook.com");
		
	}else{
		echo "Email bestaat niet.";
	}
}

?>