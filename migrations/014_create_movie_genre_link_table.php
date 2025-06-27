<?php
require("../connections/connection.php");

$query = "CREATE TABLE tickets (
    movie_id INT NOT NULL,
    genre_id INT NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (genre_id) REFERENCES genres(id),
    PRIMARY KEY (movie_id, genre_id)
);
";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>