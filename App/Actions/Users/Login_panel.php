<?php

namespace App\Actions\Users;

use App\Modals\Users;
class Login_panel
{
    public static function execute(string $username, string $password)
    {
        Users::Login($username, $password);
    }
}