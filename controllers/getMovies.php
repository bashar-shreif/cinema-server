<?php

require("../models/Movie.php");

$response = [];
$response["status"] = 200;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $user = User::selectById($conn, $id);
    if ($user == null) {
        return null;
    }
    $response["user"] = $user->toArray();
    echo json_encode($response);
    return;
}