<?php

namespace App\Actions\Posts;

use App\Modals\Posts;
class Count_Post_Admin
{
    public static function execute(string $date)
    {
        return Posts::Count_in_date($date);
    }
}