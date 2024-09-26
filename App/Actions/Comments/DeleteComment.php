<?php

namespace App\Actions\Comments;

use App\Modals\Comments;

class DeleteComment
{
    public static function execute(int $id)
    {
        return Comments::Delete($id);
    }
}