<?php
require("../connections/connection.php");

$query = "CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    duration TIME NOT NULL,
    rating VARCHAR(10),
    trailer_url VARCHAR(255),
    release_date DATE NOT NULL
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>