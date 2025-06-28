<?php

require("Model.php");

class Auditorium extends Model
{
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
}