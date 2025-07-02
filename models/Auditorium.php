<?php

require("Model.php");

class Auditorium extends Model
{
    protected static $table = "auditoriums";
    protected static $primaryKey = "id";
    private int $id;
    private string $name;
    private int $total_columns;
    private int $total_rows;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->total_columns = $data["total_columns"];
        $this->total_rows = $data["total_rows"];
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getTotalColumns(): int
    {
        return $this->total_columns;
    }
    public function getTotalRows(): int
    {
        return $this->total_rows;
    }
}