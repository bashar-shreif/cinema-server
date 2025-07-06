<?php

require("Route.php");

//Routes to the movie controller.
Route::Route($apis, '/movies', 'MovieController::getAll()');
Route::Route($apis,'/delete_movie','MovieController::deleteAll()');
Route::Route($apis,'/add_movie','MovieController::create()');
Route::Route($apis,'/edit_movie','MovieController::edit()');
Route::Route($apis,'/new_movies','MovieController::getUpcomingMovies()');
Route::Route($apis,'/current_movies','MovieController::getCurrentMovies()');

//Routes to the user controller
Route::Route($apis, '/users', 'UserController::getAll()');
Route::Route($apis,'/delete_user','UserController::deleteAll()');
Route::Route($apis,'/add_user','UserController::create()');
Route::Route($apis,'/edit_user','UserController::edit()');



?>