<?php

require("../models/Movie.php");

$response = [];
$response["status"] = 200;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $movie = Movie::selectById($conn, $id);
    if ($movie == null) {
        return null;
    }
    $response["movie"] = $movie->toArray();
    echo json_encode($response);
    return;
}