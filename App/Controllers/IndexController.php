<?php

namespace App\Controllers;

class IndexController
{
    public function panel_index()
    {
        $admin = session_admin();

        if ($admin === false) {
            return panel_login();
        }
        return panel_index();
    }
    public function panel_index_right()
    {
        $admin = session_admin();

        if ($admin === false) {
            return panel_login();
        }
        return panel_index();
    }

    public function panel_manage_setting()
    {
        return panel_manage_setting();
    }
}