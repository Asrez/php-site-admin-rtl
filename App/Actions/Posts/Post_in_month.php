<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class Post_in_month
{
    public static function execute(string $date)
    {
        return Posts::Post_in_month($date);
    }
}