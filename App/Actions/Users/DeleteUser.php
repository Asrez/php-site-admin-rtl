<?php

namespace App\Actions\Users;

use App\Modals\Users;

class DeleteUser
{
    public static function execute(int $id): void
    {
        return Users::Delete($id);
    }
}