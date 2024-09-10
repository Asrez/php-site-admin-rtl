<?php

namespace App\Actions\Comments;

use App\Modals\Comments;
class NotConfirmedComment
{
    public static function execute()
    {
        return Comments::NotConfirmed();
    }
}