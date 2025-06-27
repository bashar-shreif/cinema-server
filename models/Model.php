<?php

require("../connections/connection.php");

abstract class Model {
    protected static string $table;
    protected static string $primary_key;

    public static function selectById(int $id) {
        $sql = sprintf("Select * from %s where %s = ?",
                        static::$table,
                        static::$primary_key);
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
    public static function selectAll() {
        $sql = sprintf("Select * from %s", static::$table);
        $query = $conn->prepare($sql);
        $query->execute();
        $data = $query->get_result();
        $objects = [];
        while($row = data->fetch_assoc()){
            $objects[] = new static($row);
        }
        return $objects;
    }
    public static function create(array $data) {
        $columns = "";
        $values = "";
        foreach ($data as $key => $value) {
            $columns += "{$key},";
            $values += "{$value},";
        }
        $sql = sprintf("Insert into %s ({substr($columns, 0, -1)}) values ({substr($values, 0, -1)})", static::$table);
        $query = $conn->prepare($sql);
        return $query->execute();
    }
    public static function update(array $data, int $id) {
        $updatable = "";
        foreach ($data as $key => $value) {
            $updatable += "{$key} = {$value},";
        }
        $sql = sprintf("Update %s set {substr($updatable, 0, -1)} where %s = ?", static::$table, static::$primary_key);
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        return $query->execute();
    }
    public static function delete(int $id) {
        $sql = sprintf("DELETE FROM %s WHERE EXISTS
                    (SELECT * FROM %s WHERE %s = ?);",
                    static::$table,
                    static::$table,
                    static::$primary_key);
        $query = $conn->prepare($sql);
        $query->bind_param("i", $id);
        if($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function countBy() {}
    public static function exists() {}

}