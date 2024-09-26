<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class GetByIdPost
{
    public static function execute(int $id): array
    {
        return Posts::GetById($id);
    }
}