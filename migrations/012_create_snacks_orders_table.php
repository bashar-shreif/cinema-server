<?php
require("../connections/connection.php");

$query = "CREATE TABLE snack_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>