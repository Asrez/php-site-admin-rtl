<?php

namespace App\Actions\Users;

use App\Modals\Users;
class SetAdminUser
{
    public static function execute(int $id)
    {
        return Users::SetAsAdmin($id);
    }
}