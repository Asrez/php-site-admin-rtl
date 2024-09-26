<?php

namespace App\Actions\Users;

use App\Modals\Users;
class SetAdminUser
{
    public static function execute(int $id): void
    {
        return Users::SetAsAdmin($id);
    }
}