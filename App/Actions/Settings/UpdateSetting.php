<?php

namespace App\Actions\Settings;

use App\Modals\Settings;

class UpdateSetting
{
    public static function execute(array $data): void
    {
        return Settings::Update($data);
    }

    public static function execute2(array $data): void
    {
        return Settings::Update2($data);
    }
}