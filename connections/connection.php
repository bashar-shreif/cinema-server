<?php 

$db_host = "localhost";
$db_name = "cinema_db"; 
$db_user = "root"; 
$db_pass = null;

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}
?>