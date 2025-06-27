<?php

require("../models/Model.php");

class User extends Model {

    private int $id;
    private string $username;
    private string $name;
    private string $email;
    private string $password;
    private string $phone;
    private int $user_type_id;

    public static function getByEmail() {}
    public static function verifyAge() {}
    public static function getFavoriteGenre() {}
    public static function getBookingCount() {}

}