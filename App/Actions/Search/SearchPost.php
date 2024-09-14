<?php

namespace App\Actions\Search;

use App\Modals\Search;

class SearchPost
{
    public static function execute(string $title)
    {
        return Search::SearchPost($title);
    }
}