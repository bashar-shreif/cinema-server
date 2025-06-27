<?php
require("../connection/connection.php");

$query = "CREATE TABLE tickets (
    movie_id INT,
    genre_id INT,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (genre_id) REFERENCES genres(id),
    PRIMARY KEY (movie_id, genre_id)
);
";

$execution = $mysqli->prepare($query);
$execution->execute();