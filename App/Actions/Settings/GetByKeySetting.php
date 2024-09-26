<?php

namespace App\Actions\Settings;

use App\Modals\Settings;
class GetByKeySetting
{
    public static function execute(string $key): array
    {
        return Settings::GetByKey($key);
    }
}