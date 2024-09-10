<?php

namespace App\Controllers;

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
        return panel_manage_setting();
    }
}