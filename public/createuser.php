<!-- <?php

// require_once 'connect.php';

// $link = mysqli_connect("localhost", "root", "", "cs4400_74");

// echo $_POST['username'];
// echo $_POST['email'];
// echo $_POST['password'];
// echo $_POST['userType'];
// $sql = "INSERT INTO user (email, username, password, usertype) VALUES ('peterparker@mail.com', peter, asdfasdf, Admin)";
// if (mysqli_query($link, $sql)){
// 	echo "Success";
// } else{
// 	echo "fail";
// }

// $mysqli->query('INSERT INTO User Values ('  + $_POST['email'] + ', ' + $_POST['username'] + ', ' + $_POST['password'] + ', ' + $_POST['usertype']);

// $mysqli->close();

?> -->

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['userType'];
$city = $_POST['city'];
$state = $_POST['state'];
$title = $_POST['Title'];

echo $title;
echo $city;
echo $state; 

if($usertype == "City Scientist"){
	$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', 'City_Scientist')";
}

if($usertype == "Admin"){
	$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', 'Admin')";
}

if($usertype == "City Official"){
	$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', 'CITY_OFFICIAL')";
 	$sql = "INSERT INTO CITY_OFFICIAL VALUES ('$username', '$title', '', '$city', '$state')";
	Echo "Fuck";
}
// Attempt insert query execution



if(mysqli_query($link, $sql)){
	echo $usertype;
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$admin = 'adminFunction.php';
$official = 'cityOfficialFunction.php';

if($usertype == "Admin") {
	header("Location: http://$host$uri/$admin");
} else if($usertype == "City Official"){
	header("Location: http://$host$uri/$official");
} 


 
// Close connection
mysqli_close($link);
?>