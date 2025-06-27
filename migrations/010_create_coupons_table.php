<?php
require("../connection/connection.php");

$query = "";

$execution = $mysqli->prepare($query);
$execution->execute();