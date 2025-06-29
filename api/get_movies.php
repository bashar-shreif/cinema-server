<?php 
require("../models/Article.php");
require("../models/User.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;

if(!isset($_GET["id"])){
    $movies = Movie::selectAll($mysqli); //reminder: this is an array of OBJECTS!!!!

    $response["movies"] = []; //json_encode DOES NOT read private attributes!!!
    foreach($movies as $m){
        $response["movies"][] = $m->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
    }
    echo json_encode($response); //now we can call json_encode on array of arrays. 
    return;
}

$id = $_GET["id"];
$article = Article::find($mysqli, $id);
$response["article"] = $article->toArray();

echo json_encode($response);
return;