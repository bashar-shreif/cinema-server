<?php

require(__DIR__ . "/../models/Model.php");
require(__DIR__ . "/../services/UtilService.php");
require(__DIR__ . "/../services/ResponseService.php");

abstract class Controller
{
    protected static string $model;
    protected static array $required_fields;

    //getAll method returns all if there's nothing in $_GET, and if there's an id in $_GET it returns the row of the id
    public static function getAll()
    {
        if (!isset($_GET["id"])) {
            $all = static::$model::all();
            $all_arrays = UtilService::manyToArray($all);
            echo ResponseService::success_response($all_arrays);
            return;
        }

        $id = $_GET["id"];
        $result = static::$model::find($id)->toArray();
        echo ResponseService::success_response($result);
        return;
    }
    //getAll method deletes all if there's nothing in $_GET, and if there's an id in $_GET it deletes the row of the id
    public function deleteAll()
    {
        if (!isset($_POST["id"])) {
            $all = static::$model::deleteAll();
            echo ResponseService::success_response($all);
            return;
        }

        $id = $_POST["id"];
        $all = static::$model::delete($id);
        echo ResponseService::success_response($all);
        return;
    }
    //add method adds a row
    public function add()
    {
        foreach (static::$required_fields as $field) {
            if (!isset($_POST[$field]))
                echo ResponseService::error_response("Missing Information");
            return;
        }
        $all = [];
        foreach (static::$required_fields as $field)
            $all[$field] = $_POST[$field];

        $inserted_id = static::$model::create($all);
        echo ResponseService::success_response($inserted_id);
        return;
    }
    //edit method edits a row
    public function edit()
    {
        if (empty($_POST)) {
            echo ResponseService::error_response("Nothing to edit");
            return;
        }
        $id = $_POST["id"];
        $row = [];
        foreach ($_POST as $key => $value) {
            if (strcmp($key, "id"))
                $row[$key] = $value;
        }
        $response = static::$model::update($row, $id) . " rows updated.";
        echo ResponseService::success_response($response);
    }
}