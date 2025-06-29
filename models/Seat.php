<?php

require("Model.php");

class Seat extends Model {
    protected static $table = "seats";
    protected static $primaryKey = "id";    private int $id;
    private int $auditorium_id;
    private string $row_label;
    private int $seat_number;
    private bool $is_locked;
    
    public function getSeats() {

    }
    public function isAvailable() {
        return $this->is_locked;
    }
    public function lockSeat() {
        $this->is_locked = true;
    }

}