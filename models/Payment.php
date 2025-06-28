<?php

require("Model.php");

class Payment extends Model {

    public function addPayment() {}

    private int $id;
    private int $booking_id;
    private float $amount;
    private int $method_id;
    private string $date;

    public function __construct(array $data) {
        $this->id = $data["id"];
        $this->booking_id = $data["booking_id"];
        $this->amount = $data["amount"];
        $this->method_id = $data["method_id"];
        $this->date = $data["date"];
    }

}