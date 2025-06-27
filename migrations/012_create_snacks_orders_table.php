<?php
require("../connection/connection.php");

$query = "CREATE TABLE snack_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    quantity INT,
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
);";

$execution = $mysqli->prepare($query);
$execution->execute();