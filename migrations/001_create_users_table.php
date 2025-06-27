<?php
require("../connection/connection.php");

$query ="CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255)
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(25)
    user_type_id INT,
    FOREIGN KEY (user_type_id) REFERENCES users (id)
);";

$execution = $mysqli->prepare($query);
$execution->execute();