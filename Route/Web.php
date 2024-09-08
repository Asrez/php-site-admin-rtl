<?php

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\IndexController;

Flight::group("/panel", function () {

    Flight::route("GET /", [new IndexController, "panel_index"]);
    Flight::route("GET /right", [new IndexController, "panel_index_right"]);
    Flight::route("GET /login", [new UserController, "panel_login"]);
    Flight::route("GET /signup", [new UserController, "panel_signup"]);
    Flight::route("GET /logout", [new UserController, "panel_logout"]);

    Flight::group("/manage", function () {
        Flight::route("GET /posts", [new PostController, "panel_manage_posts"]);
        Flight::route("GET /users", [new UserController, "panel_manage_users"]);
        Flight::route("GET /setting", [new IndexController, "panel_manage_setting"]);
        Flight::route("GET /account", [new PostController, "panel_manage_account"]);
    });

    Flight::group("/posts", function () {
        Flight::route("GET /", [new PostController, "panel_posts"]);
        Flight::route("GET /@id", [new UserController, "panel_show_post"]);
    });

    Flight::group("/users", function () {
        Flight::route("GET /", [new PostController, "panel_users"]);
        Flight::route("GET /@id", [new UserController, "panel_show_user"]);
    });

    Flight::group("/result", function () {
        Flight::route("POST /login", [new UserController, "panel_result_login"]);
        Flight::route("POST /create-post", [new UserController, "panel_result_create_post"]);
        Flight::route("GET /delete-post/@id", [new UserController, "panel_result_delete_post"]);
        Flight::route("POST /update-post/@id", [new UserController, "panel_result_update_post"]);
        Flight::route("POST /create-user", [new PostController, "panel_result_create_user"]);
        Flight::route("GET /delete-user/@id", [new PostController, "panel_result_delete_user"]);
        Flight::route("POST /update-user/@id", [new PostController, "panel_result_update_user"]);
    });
});

