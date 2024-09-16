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
        return panel_index();
    }

    public function panel_manage_setting()
    {
        return panel_manage_setting();
    }
    
    public function panel_manage_advers()
    {
        return panel_manage_advers();
    }

    public function panel_search_all()
    {

        if (isset($_GET['search']))
            return panel_search_all($_GET['search']);
        else
            return panel_index();
    }
}