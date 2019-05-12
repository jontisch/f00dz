<?php

$server = "localhost";
$user = "foodz";
$pass = "f00dz";
$database = "foodz";

$conn = new mysqli($server, $user, $pass, $database);

if ($conn->connect_errno){
	echo "Failed to connect to MYSQL: " . $mysqli->connect_error;
}
$conn->set_charset('utf8');

?>
