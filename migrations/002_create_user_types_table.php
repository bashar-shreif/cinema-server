<?php
require("../connection/connection.php");

$query = "CREATE TABLE user_types (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(50)
        );";

$execution = $mysqli->prepare($query);
$execution->execute();