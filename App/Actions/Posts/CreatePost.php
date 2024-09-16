<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class CreatePost
{
    public static function execute(array $data)
    {
        return Posts::Create($data);
    }
}