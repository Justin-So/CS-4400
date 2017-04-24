<?php

require_once 'connect.php';
echo '<pre>';
print_r($_POST);

$sql = '';
$date = date("Y/m/d");
foreach ($_POST['selectedValue'] as $loc) {
	$sql = "update POI set flag = 1, Date_Flagged = '$date' where Location_Name = '$loc'; ";
}
// echo $sql;
mysqli_multi_query($link, $sql);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$temp = 'detailPOI.php';

	
header("Location: http://$host$uri/$temp");



mysqli_close($link);

?>