<?php

namespace App\Actions\Posts;

use App\Modals\Posts;
class CountPost
{
    public static function execute()
    {
        return Posts::Count();
    }
}