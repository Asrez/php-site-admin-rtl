<?php

namespace App\Actions\Posts;

use App\Modals\Posts;

class NotConfirmed
{
    public static function execute()
    {
        return Posts::NotConfirmed();
    }
}