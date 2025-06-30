<?php

require("../connections/connection.php");
abstract class Model
{
    protected static ?string $table = null;
    protected static ?string $primary_key = null;

    public static function selectById(mysqli $conn, int $id)
    {
        
        $sql = sprintf(
            "Select * from %s where %s = ?",
            static::$table,
            static::$primary_key
        );
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
    public static function selectAll(mysqli $conn)
    {
        $sql = sprintf("Select * from %s", static::$table);
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row);
        }
        return $objects;
    }
    public static function create(mysqli $conn, array $data)
    {
        $columns = implode(",", array_keys($data));
        $values = implode(",", array_values($data));
        $sql = sprintf("Insert into %s (%s) values (%s)", static::$table, $columns, $values); 
        $query = $conn->prepare($sql);
        $query->execute();

    }
    public static function update(mysqli $conn, array $data, int $id)
    {
        $updatable = [];
        foreach ($data as $key => $value) {
            $updatable[] = "$key = ?";
        }
        $updatablestr = implode(",", $updatable);
        $sql = sprintf("Update %s set %s where %s = ?", static::$table, $updatablestr,  static::$primary_key);
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        return $query->execute();
    }
    public static function delete(mysqli $conn, int $id)
    {
        $sql = sprintf("DELETE FROM %s WHERE EXISTS
                    (SELECT * FROM %s WHERE %s = ?);",
            static::$table,
            static::$table,
            static::$primary_key
        );
        $query = $conn->prepare($sql);

        $query->bind_param("i", $id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function countBy()
    {
    }
    public static function exists(mysqli $conn, string $data)
    {
        $sql = sprintf("select exists (select * from %s where email = ?)", static::$table);
        $query = $conn->prepare($sql);
        $query->bind_param("s", $data["email"]);
        $query->execute();
        $data = $query->get_result();
        if ($data->fetch_assoc()) {
            return true;
        } else {
            return false;
        }
    }

}

