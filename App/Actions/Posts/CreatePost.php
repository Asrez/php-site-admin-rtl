<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class CreatePost
{
    public static function execute(array $data): bool
    {
        return Posts::Create($data);
    }
}