<?php
require("../connection/connection.php");

$query = "CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(255),
);";

$execution = $mysqli->prepare($query);
$execution->execute();