<?php

namespace App\Actions\Users;

use App\Modals\Users;
class CountUser
{
    public static function execute()
    {
        return Users::Count();
    }
}