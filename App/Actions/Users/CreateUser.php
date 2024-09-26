<?php

namespace App\Actions\Users;

use App\Modals\Users;
class CreateUser
{
    public static function execute(array $data): bool
    {
        return Users::Create($data);
    }
}