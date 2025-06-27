<?php
require("../connections/connection.php");

$query = "CREATE TABLE orders_snacks (
    snack_id INT NOT NULL,
    snack_order_id INT NOT NULL,
    FOREIGN KEY (snack_id) REFERENCES snacks(id),
    FOREIGN KEY (snack_order_id) REFERENCES snack_orders(id),
    PRIMARY KEY (snack_id, snack_order_id)
);";


$execution = $conn->prepare($query);
$execution->execute();

$conn->close();
?>