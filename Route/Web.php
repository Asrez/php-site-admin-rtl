<?php

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\IndexController;
use App\Middleware\AuthMiddleware;

Flight::group("/panel", function () {
    Flight::route("GET /", [new IndexController, "panel_index"])->addMiddleware([new AuthMiddleware]);
    Flight::route("GET /login", [new UserController, "panel_login"]);
    Flight::route("POST /result/login", [new UserController, "panel_result_login"]);
    Flight::route("POST /result/signup", [new UserController, "panel_result_signup"]);
    Flight::route("GET /signup", [new UserController, "panel_signup"]);

    Flight::route("GET /logout", [new UserController, "panel_logout"]);

    Flight::group("", function () {

        Flight::group("/manage", function () {
            Flight::route("GET /posts", [new PostController, "panel_manage_posts"]);
            Flight::route("GET /users", [new UserController, "panel_manage_users"]);
            Flight::route("GET /advertisings", [new IndexController, "panel_manage_advers"]);
            Flight::route("GET /settings", [new IndexController, "panel_manage_setting"]);
            Flight::route("GET /account", [new UserController, "panel_manage_account"]);
        });

        Flight::group("/posts", function () {
            Flight::route("GET /", [new PostController, "panel_posts"]);
            Flight::route("GET /@id", [new UserController, "panel_show_post"]);
        });

        Flight::group("/users", function () {
            Flight::route("GET /", [new UserController, "panel_users"]);
            Flight::route("GET /@id", [new UserController, "panel_show_user"]);
        });

        Flight::route("GET /search", [new IndexController, "panel_search_all"]);
        Flight::route("GET /search/users", [new UserController, "panel_search_users"]);
        Flight::route("GET /search/posts", [new PostController, "panel_search_posts"]);

        Flight::group("/result", function () {
            Flight::route("POST /account", [new UserController, "panel_result_account"]);

            Flight::group("/post", function () {
                Flight::route("POST /create", [new PostController, "panel_result_create_post"]);
                Flight::route("GET /delete/@id", [new PostController, "panel_result_delete_post"]);
                Flight::route("POST /update/@id", [new PostController, "panel_result_update_post"]);
                Flight::route("GET /confirm/@id", [new PostController, "panel_result_confirm_post"]);

            });
            Flight::group("/user", function () {
                Flight::route("POST /create", [new UserController, "panel_result_create_user"]);
                Flight::route("GET /delete/@id", [new UserController, "panel_result_delete_user"]);
                Flight::route("POST /update/@id", [new UserController, "panel_result_update_user"]);
                Flight::route("GET /setadmin/@id", [new UserController, "panel_result_set_admin_user"]);

            });
        });
    }, [new AuthMiddleware]);
});
