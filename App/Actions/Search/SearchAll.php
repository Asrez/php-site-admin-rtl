<?php

namespace App\Actions\Search;

use App\Modals\Search;

class SearchAll
{
    public static function execute(string $title)
    {
        return Search::search($title);
    }
}