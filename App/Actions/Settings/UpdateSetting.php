<?php

namespace App\Actions\Settings;

use App\Modals\Settings;

class UpdateSetting
{
    public static function execute(array $data)
    {
        return Settings::Update($data);
    }

    public static function execute2(array $data)
    {
        return Settings::Update2($data);
    }
}