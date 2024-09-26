<?php

namespace App\Actions\Users;

use App\Modals\Users;
class UpdateUser
{
    public static function execute(array $data): bool
    {
        return Users::Update($data);
    }
}