<?php

namespace App\Controllers;

use App\Modals\Users;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class UserController
{
    public function panel_login()
    {
        return panel_login();
    }

    public function panel_result_login()
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btnlogin'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $result = Users::Login($username, $password);

                if ($result === true)
                    Flight::redirect("/panel/login?login=true");
                else
                    Flight::redirect("/panel/login?login=false");
            }
        }
        else Flight::redirect("/panel/login?login=nofill");
    }

    public function panel_signup()
    {
        return panel_signup();
    }

    public function panel_result_signup()
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required']
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btnsignup'])) {
                $username = $_POST['username'];
                $password =md5($_POST['password']);
                $name = $_POST['name'];
                $email = $_POST['email'];

                $data = [
                    "name" => $name,
                    "username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "state" => 1
                ];

                $result = Users::Create($data);

                if ($result === true)
                    Flight::redirect("/panel/signup?signup=true");
                else
                    Flight::redirect("/panel/signup?signup=false");
            }
        }
        else Flight::redirect("/panel/signup?signup=nofill");
    }

    public function panel_users()
    {
        $admin = session_admin();
     
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_users($admin);
            
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }

    }

    public function panel_manage_users()
    {
        $admin = session_admin();
     
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_manage_users($admin);
            
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }

    }

    public function panel_manage_account()
    {
        $admin = session_admin();
     
        try {
            if ($admin === false) {
                return panel_login();
            }
            else
                return panel_manage_account($admin);
            
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
                    return panel_search_user($admin, $_GET['search']);
                else
                    return panel_manage_users($admin);
            }
                
        } catch (Exception $exception) {
            var_dump($exception->getMessage());exit;
        }
    }
}