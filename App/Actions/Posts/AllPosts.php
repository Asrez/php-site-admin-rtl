<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class AllPosts
{
    public static function execute()
    {
        return Posts::GetAll();
    }
}