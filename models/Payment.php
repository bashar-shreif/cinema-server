<?php

require("Model.php");

class Payment extends Model
{
    protected static $table = "payments";
    protected static $primaryKey = "id";

    private int $id;
    private int $booking_id;
    private float $amount;
    private int $method_id;
    private string $date;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->booking_id = $data["booking_id"];
        $this->amount = $data["amount"];
        $this->method_id = $data["method_id"];
        $this->date = $data["date"];
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getBookingId(): int
    {
        return $this->booking_id;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getMethodId(): int
    {
        return $this->method_id;
    }
    public function getDate(): string
    {
        return $this->date;
    }


}