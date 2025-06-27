<?php 

$db_host = "127.0.0.1";
$db_name = "cinema_db"; 
$db_user = "root"; 
$db_pass = "";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}
echo "Connected";
?>