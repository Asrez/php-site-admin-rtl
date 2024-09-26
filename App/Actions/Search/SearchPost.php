<?php

namespace App\Actions\Search;

use App\Modals\Search;

class SearchPost
{
    public static function execute(string $title): array
    {
        return Search::SearchPost($title);
    }
}