<?php
require("../connections/connection.php");
require("../models/Model.php");

class User extends Model {

    private int $id;
    private string $username;
    private string $name;
    private string $email;
    private string $password;
    private string $phone;
    private int $user_type_id;

    public static function getByEmail(mysqli $conn, string $email) {
         $sql = "Select * from users where email = ?";
         $query = $conn->prepare();
         $query->bind_param("s", $email);
         $query->execute();
         $data = $query->get_result()-fetch_assoc();
         return $data ? new static($data) : null;
    }
    public static function verifyAge() {}
    public static function getFavoriteGenre() {}
    public static function getBookingCount() {}
    

}