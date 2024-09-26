<?php

namespace App\Actions\Settings;

use App\Modals\Settings;
class DeleteSetting
{
    public static function execute(int $id): void
    {
        return Settings::Delete($id);
    }

}