<?php
require("../connection/connection.php");

$query = "CREATE TABLE seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    auditorium_id INT,
    row_label CHAR(1),
    seat_number INT,
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);";

$execution = $mysqli->prepare($query);
$execution->execute();