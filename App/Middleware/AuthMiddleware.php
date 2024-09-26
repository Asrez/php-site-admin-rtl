<?php
namespace App\Middleware;

use Flight;

class AuthMiddleware
{
    public static function before(): bool
    {
        if (!(isset($_SESSION['admin_id']))) {
            Flight::redirect("/panel/login");
            exit();
        }
        return true;
    }
}