<?php

require("Model.php");

class Movie extends Model
{
    protected static $table = "movies";
    protected static $primaryKey = "id";
    private int $id;
    private string $title;
    private string $description;
    private string $rating;
    private string $trailer_url;
    private string $release_date;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->rating = $data["rating"];
        $this->trailer_url = $data["trailer_url"];
        $this->release_date = $data["release_date"];
    }
    public function getCurrentMovies(mysqli $conn)
    {
        $sql = "Select * movies where release_date < NOW();";
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new Movie($row);
        }
        return $objects;
    }
    public function getUpcomingMovies(mysqli $conn)
    {
                $sql = "Select * movies where release_date > NOW();";
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new Movie($row);
        }
        return $objects;
    }
    public function getMovieDetails()
    {
        return [$this->id, $this->title, $this->description, $this->rating, $this->trailer_url, $this->release_date];
    }

}