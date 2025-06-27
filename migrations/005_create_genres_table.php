<?php
require("../connections/connection.php");

$query = "CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(255) NOT NULL,
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>