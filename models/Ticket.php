<?php

require("Model.php");

class Ticket extends Model {

    private int $id;
    private int $movie_id;
    private int $auditorium_id;
    private string $date;
    private string $time;
    private float $price;

    public function getMovieTickets() {}
    public function getTicketDetails() {}

}