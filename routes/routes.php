<?php

require("Route.php");

Route::Route($apis, '/movies', 'MovieController::getAll()');
Route::Route($apis,'','');
?>