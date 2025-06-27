<?php

require("Model.php");

class Auditorium extends Model {
    private int $id;
    private int $total_columns;
    private int $total_rows;
    private string $name;
}