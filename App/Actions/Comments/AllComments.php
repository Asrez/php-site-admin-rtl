<?php

namespace App\Actions\Comments;

use App\Modals\Comments;
class AllComments
{
    public static function execute(): array
    {
        return Comments::GetAll();
    }
}