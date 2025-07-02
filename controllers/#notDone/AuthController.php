<?php
require("Controller.php");
require("../models/User.php");

class AuthController extends Controller
{
    private static $user = new User([]);
    private mysqli $conn;


    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }
    public static function login(mysqli $conn, array $data)
    {
        $user = User::getByEmail($conn, $data["email"]);
        if (!$user)
            return false;
        else {
            if (!password_verify($data["password"], $user->getPassword()))
                return false;
        }
        return json_encode(['success' => true, 'data' => $data, 'message' => 'Success message']);
    }
    public function logout()
    {
    }
    public function register(mysqli $conn, array $data)
    {
        User::create($conn, $data);
        AuthController::login($conn, $data);
    }
    public function checkAuthentication()
    {
    }
    public function isAdmin()
    {
    }

}// Success response

// Error response  
echo json_encode(['success' => false, 'error' => 'Error message']);