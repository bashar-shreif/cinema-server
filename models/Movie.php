<?php

require("Model.php");

class Movie extends Model
{
    protected static ?string $table = "movies";
    protected static ?string $primary_key = "id";
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
    public static function getCurrentMovies(mysqli $conn)
    {
        $sql = "Select * from movies where release_date < NOW();";
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new Movie($row);
        }
        return $objects;
    }
    public static function getUpcomingMovies(mysqli $conn)
    {
        $sql = "Select * from movies where release_date > NOW();";
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new Movie($row);
        }
        return $objects;
    }
    public function toArray()
    {
        return [$this->id, $this->title, $this->description, $this->rating, $this->trailer_url, $this->release_date];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function getTrailerUrl()
    {
        return $this->trailer_url;
    }
    public function getReleaseDate()
    {
        return $this->release_date;
    }
}