<?php

namespace App\Actions\Users;

use App\Modals\Users;
class Get_In_MonthUser
{
    public static function execute(string $date): array
    {
        return Users::Get_In_Month($date);
    }
}