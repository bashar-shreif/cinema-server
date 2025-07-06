<?php
require_once(__DIR__ . '/../connection/connection.php');

abstract class Model
{

    protected static string $table;
    protected static string $primary_key = "id";
    protected static ?mysqli $mysqli = null;
    public static function setMysqli(mysqli $mysqli): void
    {
        self::$mysqli = $mysqli;

    }
    public static function find(int $id)
    {
        $mysqli = self::$mysqli;
        $sql = sprintf(
            "Select * from %s WHERE %s = ?",
            static::$table,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all()
    {
        $mysqli = self::$mysqli;
        $sql = sprintf("Select * from %s", static::$table);

        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }

    public static function create(array $data)
    {
        $mysqli = self::$mysqli;
        
        $columns = implode(",", array_keys($data));
        $values = implode(", ", array_fill(0, count($data), "?"));

        $vars = "";
        foreach ($data as $key => $value) {
            $vars .= (string) gettype($value)[0];
        }

        $sql = sprintf("Insert into %s (%s) values (%s)", static::$table, $columns, $values);
        $query = $mysqli->prepare($sql);

        $bound = array_values($data);
        $query->bind_param($vars, ...$bound);

        $query->execute();
        return $query->insert_id;
    }
    public static function update(array $data, int $id)
    {
        $mysqli = self::$mysqli;

        $updatable = [];
        foreach ($data as $key => $value) {
            $updatable[] = "$key = ?";
        }

        $updatablestr = implode(",", $updatable);
        $vars = "";
        foreach ($data as $key => $value) {
            $vars .= (string) gettype($value)[0];
        }
        $var = $vars .= "i";
        $bound = array_values($data);
        $bound[] = $id;

        $sql = sprintf("Update %s set %s where %s = ?", static::$table, $updatablestr, static::$primary_key);
        $query = $mysqli->prepare($sql);

        $query->bind_param($vars, ...$bound);
        $query->execute();
        
        return $query->affected_rows;
    }
    public static function delete(int $id)
    {
        $mysqli = self::$mysqli;
        $sql = sprintf(
            "DELETE FROM %s WHERE %s = ?;",
            static::$table,
            static::$primary_key
        );
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        if ($query->execute())
            return true;
        else
            return false;
    }
    public static function deleteAll()
    {
        $mysqli = self::$mysqli;
        $sql = sprintf(
            "DELETE FROM %s WHERE TRUE;",
            static::$table
        );
        $query = $mysqli->prepare($sql);
        if ($query->execute())
            return true;
        else
            return false;
    }
}