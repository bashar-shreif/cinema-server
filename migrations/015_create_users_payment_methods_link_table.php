<?php
require("../connections/connection.php");

$query = "CREATE TABLE users_payments (
            user_id INT NOT NULL,
            method_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (method_id) REFERENCES payment_methods(id)
        );";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>