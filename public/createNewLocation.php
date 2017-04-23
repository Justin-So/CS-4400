
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$location = $_POST['locationName'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipCode'];
echo $location;
echo $city;
echo $state;
echo $zipcode;

$sql = "INSERT INTO POI VALUES ('$location', '0', null, '$zipcode', '$city', '$state')";

echo $location;
echo $city;
echo $state;
echo $zipcode;

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$scientist = 'newDataPoint.php';
if(mysqli_query($link, $sql)){
	    header("Location: http://$host$uri/$scientist");
	}



 
// Close connection
mysqli_close($link);
?>