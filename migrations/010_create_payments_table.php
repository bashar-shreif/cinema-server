<?php
require("../connections/connection.php");

$query = "CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    amount DECIMAL(6,2) NOT NULL,
    method_id INT NOT NULL,
    date DATETIME NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
    FOREIGN KEY (method_id) REFERENCES payment_methods(id)
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>