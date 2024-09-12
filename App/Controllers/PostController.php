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
}