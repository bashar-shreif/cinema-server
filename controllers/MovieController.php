<?php

require("Controller.php");
require("../models/Movie.php");

Movie::setMysqli($mysqli);

class MovieController extends Controller
{
    protected static string $model = "Movie";
    protected static array $required_fields = ["title", "description", "rating", "trailer_url", "release_date"];
    public static function getUpcomingMovies()
    {
        $movies = Movie::getUpcomingMovies();
        if ($movies == null) {
            return null;
        }
        $upcoming = UtilService::manyToArray($movies);
        echo ResponseService::success_response($upcoming);
        return;
    }
    public static function getCurrentMovies()
    {
        $movies = Movie::getCurrentMovies();
        if ($movies == null) {
            return null;
        }
        $current = UtilService::manyToArray($movies);
        echo ResponseService::success_response($current);
        return;
    }



}