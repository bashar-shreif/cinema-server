<?php
require("../connections/connection.php");

$query = "ALTER TABLE seats ADD is_locked boolean DEFAULT false;";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>