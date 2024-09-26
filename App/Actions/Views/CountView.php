<?php

namespace App\Actions\Views;

use App\Modals\Views;
class CountView
{
    public static function execute(): int
    {
        return Views::Count();
    }
}