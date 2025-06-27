<?php
require("../connections/connection.php");

$query = "CREATE TABLE user_types (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(50)
        );";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>