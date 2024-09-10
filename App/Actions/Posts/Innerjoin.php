<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class Innerjoin
{
    public static function execute()
    {
        return Posts::Innerjoin();
    }
}