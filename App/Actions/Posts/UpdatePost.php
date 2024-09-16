<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class UpdatePost
{
    public static function execute(array $data)
    {
        return Posts::Update($data);
    }
}