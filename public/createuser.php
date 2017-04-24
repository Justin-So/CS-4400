
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

require_once 'connect.php';
// $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirm-password'];
$usertype = $_POST['userType'];
$city = $_POST['city'];
$state = $_POST['state'];
$title = $_POST['Title'];


if($password == $confirmpassword){
	if($usertype == "City Scientist"){
		$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', 'City_Scientist')";
	}

	if($usertype == "City Official"){
		$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', 'CITY_OFFICIAL')";
	 	$sql2 = "INSERT INTO CITY_OFFICIAL VALUES ('$username', '$title', null, '$city', '$state')";
	}

	if(mysqli_query($link, $sql)){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$admin = 'adminFunction.php';
	$official = 'cityOfficialFunction.php';
	$scientist = 'newDataPoint.php';

	if($usertype == "Admin") {
		header("Location: http://$host$uri/$admin");
	} else if($usertype == "City Official"){
		header("Location: http://$host$uri/$official");
	} else if($usertype == "City Scientist"){
	header("Location: http://$host$uri/$scientist");
	}
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	    die();
	}
	


	
} else {
	echo "Password do not match";
}


 
// Close connection
mysqli_close($link);
?>