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
    public function getPassword()
    {
        return $this->password;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getUserTypeId()
    {
        return $this->user_type_id;
    }
    public function getId()
    {
        return $this->id;
    }
    public static function register(mysqli $conn, array $data)
    {
        $sql = "Insert into users (username, name, age, email, password, phone) values (?,?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $values = array_values($data);
        //echo json_encode($values);
        $query->bind_param("ssisss", ...$values);
        $query->execute();
        $insertedId = $query->insert_id;
        return $insertedId;

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
    public function toArray()
    {
        return [$this->id, $this->username, $this->name, $this->age, $this->email, $this->password, $this->phone, $this->user_type_id];
    }
    public static function verifyAge()
    {
    }
    public static function getBookingCount()
    {
    }

}