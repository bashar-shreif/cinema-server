<?php

require("Model.php");

class Booking extends Model
{
    protected static $table = "bookings";
    protected static $primaryKey = "id";
    private int $id;
    private int $user_id;
    private int $ticket_id;
    private int $seat_id;
    private int $auditorium_id;
    private string $status;
    private string $created_at;

    public function __construct(int $id, int $user_id, int $ticket_id, int $seat_id, int $auditorium_id, string $status, string $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->ticket_id = $ticket_id;
        $this->seat_id = $seat_id;
        $this->auditorium_id = $auditorium_id;
        $this->status = $status;
        $this->created_at = $created_at;
    }
    public function cancelBooking(mysqli $conn, int $id)
    {
        $sql = "update bookings set status = \"cancelled\" where id = ?;";
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

}