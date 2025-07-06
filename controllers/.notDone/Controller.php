<?php

abstract class Controller
{
    protected mysqli $conn;

    public function sendJson($success, $data = null, $message = '', $errors = []) {
        header ('Content-Type: application/json');
    }
}