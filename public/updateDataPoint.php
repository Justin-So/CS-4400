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
 

// $location = $_POST['location_name'];
$timeDates = $_POST['selectedValue'];
$accepted = "";

if ($_POST['accept'] == "accept") {
	$accepted = "1";
} else if ($_POST['reject'] == "reject") {
	$accepted = "0";
} else {
	$accepted = "null";
}

$sql = "";

foreach ($timeDates as $t) {
	$sql .= "update data_point set Accepted = $accepted where DateTime = '$t'; ";
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$scientist = 'pendingDataPoint.php';
if(mysqli_query($link, $sql)){
	    header("Location: http://$host$uri/$scientist");
	}

// $sql = "INSERT INTO DATA_POINT VALUES ('$timeDate', '$value', null, '$location', '$type')";


// $host  = $_SERVER['HTTP_HOST'];
// $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
// $scientist = 'newDataPoint.php';
// if(mysqli_query($link, $sql)){
// 	    header("Location: http://$host$uri/$scientist");
// 	}



 
// Close connection
mysqli_close($link);
?>