<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Settings\UpdateSetting;
use App\Actions\Settings\GetByStateSetting;


class SettingController
{

    public function panel_manage_setting()
    {
        $tool = tools();
        $settings = GetByStateSetting::execute("setting");
        Flight::render(
            directory_separator("Panel", "managesetting.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "settings" => $settings
            ]
        );
    }

    public function panel_manage_advers()
    {
        $tool = tools();
        $advers = GetByStateSetting::execute("adver");
        Flight::render(
            directory_separator("Panel", "manageadvers.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "advers" => $advers
            ]
        );
    }

    public function panel_result_update_adver(int $id)
    {
        // UpdateSetting::execute($data);
    }

}