<?php
//Routing starts here (Mapping between the request and the controller & method names)
//It's an key-value array where the value is an key-value array
//----------------------------------------------------------
$apis = [
    '/login' => ['controller' => 'AuthController', 'method' => 'login'],
    '/register' => ['controller' => 'AuthController', 'method' => 'register'],

];

include("routes.php");
?>