<?php

namespace App\Actions\Comments;

use App\Modals\Comments;
class ConfirmComments
{
    public static function execute(int $id)
    {
        return Comments::Confirmed($id);
    }
}