<?php

namespace App\Actions\Comments;

use App\Modals\Comments;
class CountComment
{
    public static function execute()
    {
        return Comments::Count();
    }
}