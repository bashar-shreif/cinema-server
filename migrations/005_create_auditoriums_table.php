<?php
require("../connections/connection.php");

$query = "CREATE TABLE auditoriums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    total_rows INT NOT NULL,
    total_columns INT NOT NULL
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>