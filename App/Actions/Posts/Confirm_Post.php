<?php

namespace App\Actions\Posts;

use App\Modals\Posts;
class Confirm_Post
{
    public static function execute(int $id)
    {
        return Posts::Confirm($id);
    }
}