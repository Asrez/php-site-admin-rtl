<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class DeletePost
{
    public static function execute(int $id): void
    {
        return Posts::Delete($id);
    }
}