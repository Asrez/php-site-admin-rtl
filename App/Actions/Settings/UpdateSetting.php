<?php

namespace App\Actions\Settings;

use App\Modals\Settings;

class UpdateSetting
{
    public static function execute(array $data)
    {
        return Settings::Update($data);
    }
}