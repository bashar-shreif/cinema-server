<?php
require("../connections/connection.php");

$query = "CREATE TABLE casts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
        );";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>