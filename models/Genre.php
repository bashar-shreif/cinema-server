<?php

require("Model.php");

class Genre extends Model
{
   protected static $table = "genres";
   protected static $primaryKey = "id";
   private int $id;
   private string $genre;
   public function __construct(array $data)
   {
      $this->id = $data["id"];
      $this->genre = $data["genre"];
   }
   public function getId(): int
   {
      return $this->id;
   }
   public function getGenre(): string
   {
      return $this->genre;
   }
}