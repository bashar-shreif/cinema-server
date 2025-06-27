<?php
require("../connection/connection.php");

$query = "CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    ticket_id INT,
    seat_id INT,
    status ENUM('booked', 'cancelled') DEFAULT 'booked',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ticket_id) REFERENCES tickets(id),
    FOREIGN KEY (seat_id) REFERENCES seats(id)
);";

$execution = $mysqli->prepare($query);
$execution->execute();