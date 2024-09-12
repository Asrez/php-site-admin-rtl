<?php

namespace App\Actions\Settings;

use App\Modals\Settings;

class GetByStateSetting
{
    public static function execute(string $state)
    {
        return Settings::GetByState($state);
    }

}