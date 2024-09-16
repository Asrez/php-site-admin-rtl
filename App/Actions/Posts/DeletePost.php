<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class DeletePost
{
    public static function execute(int $id)
    {
        return Posts::Delete($id);
    }
}