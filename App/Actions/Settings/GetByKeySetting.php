<?php

namespace App\Actions\Settings;

use App\Modals\Settings;
class GetByKeySetting
{
    public static function execute(string $key)
    {
        return Settings::GetByKey($key);
    }
}