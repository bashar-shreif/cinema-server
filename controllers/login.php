<?php

require("../models/User.php");

$response = [];
$response["status"] = 200;


if (isset($_POST["email"]) && isset($_POST["password"])) {
    $data = [
        "email" => $_POST["email"],
        "password" =>$_POST["password"]
    ];
    $user = User::getByEmail($conn, $data["email"]);
    if (!$user) {
        $response["message"] = "User not found";
    } else {
        if (password_verify($data["password"], $user->getPassword())) {
            $response["Id"] = $user->getId();
        } else {
            $response["message"] = "Wrong Password";
        }
    }

    echo json_encode($response);
    return;
}
