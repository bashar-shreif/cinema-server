<?php
require("../connection/connection.php");

$query = "CREATE TABLE snacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price FLOAT
);";

$execution = $mysqli->prepare($query);
$execution->execute();