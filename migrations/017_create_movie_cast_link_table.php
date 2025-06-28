<?php
require("../connections/connection.php");

$query = "CREATE TABLE movies_casts (
            movie_id INT NOT NULL,
            cast_id INT NOT NULL,
            FOREIGN KEY (movie_id) REFERENCES movies(id),
            FOREIGN KEY (cast_id) REFERENCES casts(id)
        );";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>