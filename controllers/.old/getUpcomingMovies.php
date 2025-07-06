<?php

require("../models/Movie.php");

$response = [];
$response["status"] = 200;

$movies = Movie::getUpcomingMovies($conn);
if ($movies == null) {
    return null;
}

foreach ($movies as $movie) {
    $response["movies"][] = $movie->toArray();
}

echo json_encode($response);
return;
