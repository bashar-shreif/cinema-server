<?php

require("../models/User.php");

$response = [];
$response["status"] = 200;


if (isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["username"])&&isset($_POST["age"])&&isset($_POST["phone"])&&isset($_POST["name"])) {
$data = [
    "username" => $_POST["username"],
    "name" => $_POST["name"],
    "age" => (int) $_POST["age"],
    "email" => $_POST["email"],
    "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
    "phone" => $_POST["phone"]
];

$response["Id"] = User::register($conn, $data);

echo json_encode($response);
return;
}
