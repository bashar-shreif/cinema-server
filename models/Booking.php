<?php

require("Model.php");

class Booking extends Model {

    private int $id;
    private int $user_id;
    private int $ticket_id;
    private int $seat_id;
    private int $auditorium_id;
    private string $status;
    private string $created_at;

    public function createBooking() {}
    public function getBookingHistory() {}
    public function cancelBooking() {}
    
}