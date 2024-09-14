<?php

namespace App\Actions\Search;

use App\Modals\Search;

class SearchAdmin
{
    public static function execute(string $title)
    {
        return Search::SearchAdmin($title);
    }
}