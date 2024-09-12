<?php

namespace App\Actions\Users;

use App\Modals\Users;

class AllUsers
{
    public static function execute()
    {
        return Users::GetAllUsers();
    }
    
    public static function execute2()
    {
        return Users::GetAll();
    }
}