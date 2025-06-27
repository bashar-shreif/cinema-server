<?php

require("Model.php");

class Payment extends Model {

    public function addPayment() {}

    private int $id;
    private int $booking_id;
    private double $amount;
    private string $method;
    private string $date;

}