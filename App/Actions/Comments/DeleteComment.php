<?php

namespace App\Actions\Comments;

use App\Modals\Comments;

class DeleteComment
{
    public static function execute(int $id): void
    {
        return Comments::Delete($id);
    }
}