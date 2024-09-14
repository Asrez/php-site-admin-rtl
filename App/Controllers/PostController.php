<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class PostController
{

    public function panel_posts()
    {
        $admin = session_admin();
     
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_posts($admin);
            
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }

    }

    public function panel_manage_posts()
    {
        $admin = session_admin();
     
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_manage_posts($admin);
            
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }

    }

    public function panel_search_all()
    {
        $admin = session_admin();
        
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
            {
                if (isset($_GET['search']))
                    return panel_search_posts($admin, $_GET['search']);
                else
                    return panel_manage_posts($admin);
            }
                
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }
    }
}