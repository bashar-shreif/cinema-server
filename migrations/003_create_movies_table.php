<?php
require("../connections/connection.php");

$query = "CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    duration INT,
    rating VARCHAR(10),
    trailer_url VARCHAR(255),
    release_date DATE
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>