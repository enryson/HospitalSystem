<?php
date_default_timezone_set('America/Sao_Paulo');


$databaseHost = 'localhost';
$databaseName = 'hospApoitment';
$databaseUsername = 'hospApoitment';
$databasePassword = 'hospApoitment';

$mysqli = mysqli_connect($databaseHost, 
$databaseUsername, 
$databasePassword,
$databaseName); 

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>