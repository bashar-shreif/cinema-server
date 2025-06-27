<?php
require("../connections/connection.php");

$query = "CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    amount DECIMAL(6,2),
    method VARCHAR(50),
    date DATETIME,
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>