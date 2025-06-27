<?php
require("../connections/connection.php");

$query = "CREATE TABLE auditoriums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    total_rows INT,
    total_columns INT
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>