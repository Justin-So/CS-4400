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

$link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['userType'];

// Attempt insert query execution
$sql = "INSERT INTO USER VALUES ('$email', '$username', '$password', '$usertype')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>