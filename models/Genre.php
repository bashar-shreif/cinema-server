<?php

require("Model.php");

class Genre extends Model {
    private int $id;
    private string $genre;
     public function __construct(array $data) {
        $this->id = $data["id"];
        $this->genre = $data["genre"];
     }
}