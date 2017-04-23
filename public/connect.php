<?php

require_once 'config.php';

$link = new mysqli("localhost", $config['dbuser'], $config['dbpass'], "cs4400_74");

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}

// $mysqli->close();

?>
