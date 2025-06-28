<?php
require("../connections/connection.php");

$query = "CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    seat_id INT NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (seat_id) REFERENCES seats(id)
);";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>