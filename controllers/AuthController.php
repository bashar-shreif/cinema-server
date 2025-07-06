<?php
require("Controller.php");
require("../models/User.php");

class AuthController extends Controller
{
    public function login()
    {
        if (empty($_POST)) {
            echo ResponseService::error_response("Wrong credentials");
            return;
        }
        $user = User::getByEmail($_POST["email"]);
        if (!$user) {
            echo ResponseService::error_response("Email doesn't exist");
            return;
        }
        if (!password_verify($_POST["password"], $user->getPassword())) {
            echo ResponseService::error_response("Wrong Password");
            return;
        }
        $id = $user->getId();
        echo ResponseService::success_response($id);
        return;

    }
    public function logout()
    {
    }
    public function register()
    {
        if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["age"]) && isset($_POST["phone"]) && isset($_POST["name"])) {
            $data = [
                "username" => $_POST["username"],
                "name" => $_POST["name"],
                "age" => (int) $_POST["age"],
                "email" => $_POST["email"],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "phone" => $_POST["phone"]
            ];
        } else {
            echo ResponseService::error_response("Missing info");
            return;
        }
        if (!User::exists($_POST["email"])) {
            echo ResponseService::error_response("Email is already used");
            return;
        }
        $user = User::create($data);
        echo ResponseService::success_response($user);
        return;
    }

}