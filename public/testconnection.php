<?php

$user = 'cs4400_74';
$pass = 'e_zTUL5w';

try {
    $dbh = new PDO('mysql:academic-mysql.cc.gatech.edu=;dbname=cs4400_74', $user, $pass);
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
