<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Settings\UpdateSetting;
use App\Actions\Settings\DeleteSetting;
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
            directory_separator("Panel", "manageadver.php"),
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
        $validator = new Validator(Flight::request()->data->getData(), [
            'value_setting' => ['required'],
            'link' => [],
            'title' => [],
            'text' => []
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_update_adver'])) {
                $value_setting = $_POST['value_setting'];
                $link = $_POST['link'];
                $title = $_POST['title'];
                $text = $_POST['text'];

                $data = [
                    "text" => $text,
                    "value_setting" => $value_setting,
                    "link" => $link,
                    "title" => $title,
                    "id" => $id
                ];

                UpdateSetting::execute($data);
                Flight::redirect("/panel/manage/advertisings?adverupdate=true");

            }
        } 
        else {
            Flight::redirect("/panel/manage/advertisings?adverupdate=nofill");
        }
    }

    public function panel_result_delete_adver(int $id)
    {
            DeleteSetting::execute($id);
            Flight::redirect("/panel/manage/advertisings?adverdelete=true");
    }

    public function panel_result_update_setting(int $id)
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'value_setting' => ['required'],
            'link' => [],
            'title' => [],
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_update_setting'])) {
                $value_setting = $_POST['value_setting'];
                $link = $_POST['link'];
                $title = $_POST['title'];

                $data = [
                    "value_setting" => $value_setting,
                    "link" => $link,
                    "title" => $title,
                    "id" => $id
                ];

                UpdateSetting::execute2($data);
                Flight::redirect("/panel/manage/advertisings?settingupdate=true");

            }
        } 
        else {
            Flight::redirect("/panel/manage/advertisings?settingupdate=nofill");
        }
    }

}