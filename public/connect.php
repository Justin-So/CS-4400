<?php

require_once 'config.php';

$mysqli = new mysqli("localhost", $config['dbuser'], $config['dbpass'], "cs4400_74");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// $mysqli->close();

?>
