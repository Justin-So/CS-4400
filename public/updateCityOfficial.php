<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

require_once 'connect.php';
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// $location = $_POST['location_name'];
$usernames = $_POST['selectedValue'];
print_r($usernames);
$accepted = "";

if (isset($_POST['accept']) && $_POST['accept'] == "accept") {
	$accepted = "1";
} else if (isset($_POST['reject']) && $_POST['reject'] == "reject") {
	$accepted = "0";
} else {
	$accepted = "null";
}

$sql = "";

foreach ($usernames as $u) {
	$sql .= "update CITY_OFFICIAL set Approved = $accepted where Username = '$u'; ";
}
// echo $sql;
// die();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$scientist = 'pendingCityOfficial.php';
if(mysqli_multi_query($link, $sql)){
	mysqli_close($link);
	header("Location: http://$host$uri/$scientist");
}
 
// Close connection
?>