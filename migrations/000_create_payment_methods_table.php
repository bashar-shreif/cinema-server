<?php
require("../connections/connection.php");

$query = "CREATE TABLE payment_methods (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(50) NOT NULL
        );";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>