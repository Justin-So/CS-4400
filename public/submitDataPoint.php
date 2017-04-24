
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
 

$location = $_POST['location_name'];
$timeDate = $_POST['dataReadingDatetime'];
$type = $_POST['type'];
$value = $_POST['dataValue'];

$sql = "INSERT INTO DATA_POINT VALUES ('$timeDate', '$value', null, '$location', '$type')";

echo $location;
echo "string"; $timeDate;
echo $type;
echo $value;



$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$scientist = 'newDataPoint.php';
if(mysqli_query($link, $sql)){
		echo "Success";
		die()
	    header("Location: http://$host$uri/$scientist");
	} else {
		echo "Unsucessful";
		die();
	}



 
// Close connection
mysqli_close($link);
?>