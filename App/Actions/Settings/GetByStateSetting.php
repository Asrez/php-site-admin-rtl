<?php

namespace App\Actions\Settings;

use App\Modals\Settings;

class GetByStateSetting
{
    public static function execute(string $state): array
    {
        return Settings::GetByState($state);
    }

}