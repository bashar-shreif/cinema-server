<?php
require("../connections/connection.php");

$query = "CREATE TABLE snacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price FLOAT
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>