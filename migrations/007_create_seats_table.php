<?php
require("../connections/connection.php");

$query = "CREATE TABLE seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    auditorium_id INT NOT NULL,
    row_label CHAR(1) NOT NULL,
    seat_number INT NOT NULL,
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>