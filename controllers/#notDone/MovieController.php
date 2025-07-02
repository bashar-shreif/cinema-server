<?php
require("Controller.php");
require("../models/Movie.php");

class MovieController extends Controller
{
    public array $response = [];
    public function __construct()
    {
        $this->response["status"] = 200;
    }
    public function getUpcomingMovies()
    {

    }

}