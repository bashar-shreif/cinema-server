<?php
require("../connections/connection.php");

$query ="CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    age INT NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(25),
    user_type_id INT NOT NULL DEFAULT 0,
    FOREIGN KEY (user_type_id) REFERENCES user_types (id)
);";

$execution = $conn->prepare($query);
$execution->execute();


$conn->close();
?>