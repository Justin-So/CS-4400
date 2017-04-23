<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localho	st", "cs4400_74", "e_zTUL5w", "cs4400_74");
// $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$username = $_POST['username'];
$password = $_POST['password'];


// $sql = "SELECT username, password, userType From USER where username = '" . $username +"'";
$sql = "SELECT username, password, userType From USER where username = '$username'";

$un = '';
$pass = '';
$ut = '';
if($result = mysqli_query($link, $sql)) {
	while ($row = mysqli_fetch_array($result)) 
	{
		$un = $row['username'];
		$pass = $row['password'];
		$ut = $row['userType'];
	}
}

// echo $username;
// echo $un;
if ($un == '') {
	echo 'user name not found';
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$admin = 'adminFunction.php';
$official = 'cityOfficialFunction.php';
$scientist = 'newDataPoint.php';



if ($password == $pass) {
	echo $ut;

	if ($ut == "ADMIN") {
		header("Location: http://$host$uri/$admin");
	} else if($ut == "CITY_OFFICIAL"){
	header("Location: http://$host$uri/$official");
	} else if($ut == "CITY_SCIENTIST") {
		header("Location: http://$host$uri/$scientist");
	}
}


 
// Close connection
mysqli_close($link);
?>