<?php
require("../connections/connection.php");

$query = "CREATE TABLE tickets (
    snack_id INT,
    snack_order_id INT,
    FOREIGN KEY (snack_id) REFERENCES snacks(id),
    FOREIGN KEY (snack_order_id) REFERENCES snack_orders(id),
    PRIMARY KEY (snack_id, snack_order_id)
);
";

$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>