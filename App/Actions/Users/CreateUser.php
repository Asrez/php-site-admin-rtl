<?php

namespace App\Actions\Users;

use App\Modals\Users;
class CreateUser
{
    public static function execute(array $data)
    {
        return Users::Create($data);
    }
}