<?php

namespace App\Actions\Users;

use App\Modals\Users;
class Count_Date_User
{
    public static function execute(string $date)
    {
        return Users::Count_Date($date);
    }
}