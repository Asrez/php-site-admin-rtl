<?php

namespace App\Actions\Comments;

use App\Modals\Comments;
class NotConfirmedComment
{
    public static function execute(): array
    {
        return Comments::NotConfirmed();
    }
}