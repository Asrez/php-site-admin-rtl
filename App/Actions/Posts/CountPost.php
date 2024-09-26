<?php

namespace App\Actions\Posts;

use App\Modals\Posts;
class CountPost
{
    public static function execute(): array
    {
        return Posts::Count();
    }
}