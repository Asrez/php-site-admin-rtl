<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class Mostvisit
{
    public static function execute()
    {
        return Posts::Mostvisit();
    }
}