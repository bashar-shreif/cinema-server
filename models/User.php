<?php
require("../models/Model.php");

class User extends Model
{
    protected static ?string $table = "users";
    protected static ?string $primary_key = "id";
    private int $id;
    private string $username;
    private string $name;
    private int $age;
    private string $email;
    private string $password;
    private string $phone;
    private int $user_type_id;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->username = $data["username"];
        $this->name = $data["name"];
        $this->age = $data["age"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->phone = $data["phone"];
        $this->user_type_id = $data["user_type_id"];

    }
    public static function getByEmail(mysqli $conn, string $email)
    {
        $sql = "Select * from users where email = ?";
        $query = $conn->prepare($sql);
        $query->bind_param("s", $email);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
    public static function verifyAge()
    {
    }
    public function getPassword () {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function getPhone () {
        return $this->phone;
    }
    public function getUserTypeId () {
        return $this->user_type_id;
    }
    public function getId () {
        return $this->id;
    }
    public static function getFavoriteGenre()
    {
    }
    public static function getBookingCount()
    {
    }
    public function toArray()
    {
        return [$this->id, $this->username, $this->name, $this->age, $this->email, $this->password, $this->phone, $this->user_type_id];
    }
}