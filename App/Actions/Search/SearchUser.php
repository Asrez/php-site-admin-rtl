<?php

namespace App\Actions\Search;

use App\Modals\Search;

class SearchUser
{
    public static function execute(string $title)
    {
        return Search::SearchUser($title);
    }
}