<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

use App\Actions\Users\GetByIdUser;


class IndexController
{
    public function panel_index()
    {
        $admin = session_admin();
        
        if ($admin === false) {
            return panel_login();
        }
        else
            return panel_index($admin);
    }

    public function panel_manage_setting()
    {
        $admin = session_admin();
        
        
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_manage_setting($admin);
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }
    }
}