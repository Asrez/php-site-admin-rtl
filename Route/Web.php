<?php

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\IndexController;


Flight::group("/panel", function(){

    Flight::route("GET /", [new IndexController, "panel_index"]);

});
