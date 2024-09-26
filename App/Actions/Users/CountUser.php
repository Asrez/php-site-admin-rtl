<?php

namespace App\Actions\Users;

use App\Modals\Users;
class CountUser
{
    public static function execute(): array
    {
        return Users::Count();
    }
}