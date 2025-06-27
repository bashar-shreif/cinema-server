<?php
require("../connections/connection.php");

$query = "CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ticket_id INT NOT NULL,
    seat_id INT NOT NULL,
    status ENUM('booked', 'cancelled') DEFAULT 'booked' NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ticket_id) REFERENCES tickets(id),
    FOREIGN KEY (seat_id) REFERENCES seats(id)
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>