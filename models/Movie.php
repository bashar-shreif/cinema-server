<?php

require("Model.php");

class Movie extends Model {

    private int $id;
    private string $title;
    private string $description;
    private string $rating;
    private string $trailer_url;
    private string $release_date;

    public function getCurrentMovies() {}
    public function getUpcomingMovies() {}
    public function getMovieDetails() {}
    
}