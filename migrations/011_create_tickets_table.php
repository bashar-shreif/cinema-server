<?php
require("../connections/connection.php");

$query = "CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    auditorium_id INT,
    show_date DATE,
    show_time TIME,
    price DECIMAL(6,2),
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);
";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>