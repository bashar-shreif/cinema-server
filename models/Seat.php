<?php

require("Model.php");

class Seat extends Model {

    private int $id;
    private int $auditorium_id;
    private string $row_label;
    private int $seat_number;
    
    public function getSeats() {

    }
    public function isAvailable() {}
    public function getSeatStatus() {}
    public function lockSeat() {
        
    }

}