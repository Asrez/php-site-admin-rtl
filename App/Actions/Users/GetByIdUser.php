<?php

namespace App\Actions\Users;

use App\Modals\Users;

class GetByIdUser
{
    public static function execute(int $id): array
    {
        return Users::GetById($id);
    }
}