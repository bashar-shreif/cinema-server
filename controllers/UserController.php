<?php

require("Controller.php");
require("../models/User.php");

Movie::setMysqli($mysqli);

class UserController extends Controller
{
    protected static string $model = "Movie";
    protected static array $required_fields = ["username", "name", "age", "email", "password", "phone", "user_type_id"];

}