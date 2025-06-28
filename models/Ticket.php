<?php

require("Model.php");

class Ticket extends Model
{

    private int $id;
    private int $movie_id;
    private int $seat_id;
    private string $date;
    private string $time;
    private float $price;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->movie_id = $data["movie_id"];
        $this->seat_id = $data["seat_id"];
        $this->date = $data["date"];
        $this->time = $data["time"];
        $this->price = $data["price"];
    }

    public function getMovieTickets(mysqli $conn, int $mv_id)
    {
        $sql = "Select * from users where movie_id = ?";
        $query = $conn->prepare($sql);
        $query->bind_param("i", $mv_id);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
    public function getTicketDetails()
    {
        return [$this->id, $this->movie_id, $this->seat_id, $this->date, $this->time, $this->price];
    }

}