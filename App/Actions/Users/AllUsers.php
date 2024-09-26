<?php

namespace App\Actions\Users;

use App\Modals\Users;

class AllUsers
{
    public static function execute(): array
    {
        return Users::GetAllUsers();
    }
    
    public static function execute2(): array
    {
        return Users::GetAll();
    }

    public static function execute3(): array
    {
        return Users::GetAllAdmins();
    }
}