<?php

namespace App\Controllers;

use App\Modals\Users;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;


use App\Actions\Settings\GetByKeySetting;
use App\Actions\Settings\GetByStateSetting;
use App\Actions\Posts\CountPost;
use App\Actions\Posts\AllPosts;
use App\Actions\Posts\Innerjoin;
use App\Actions\Users\AllUsers;
use App\Actions\Posts\Mostvisit;
use App\Actions\Posts\NotConfirmed;
use App\Actions\Comments\NotConfirmedComment;
use App\Actions\Comments\AllComments;
use App\Actions\Comments\CountComment;
use App\Actions\Views\CountView;
use App\Actions\Users\CountUser;
use App\Actions\Users\Get_In_MonthUser;
use App\Actions\Users\Count_Date_User;
use App\Actions\Users\GetByIdUser;
use App\Actions\Search\SearchAll;
use App\Actions\Search\SearchPost;
use App\Actions\Search\SearchUser;
use App\Actions\Search\SearchAdmin;

class UserController
{
    public function panel_login()
    {
        Flight::render(directory_separator("Panel", "login.php"));
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
        } else
            Flight::redirect("/panel/login?login=nofill");
    }

    public function panel_signup()
    {
        Flight::render(directory_separator("Panel", "signup.php"));
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
                $password = md5($_POST['password']);
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
        } else
            Flight::redirect("/panel/signup?signup=nofill");
    }

    public function panel_users()
    {
        $tool = tools();
        $Users = AllUsers::execute2();

        Flight::render(
            directory_separator("Panel", "users.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                'admin_count' => $tool['admincount'],
                'user_count' => $tool['usercount'],
                "admin" => $tool['admin'],
                "users" => $Users
            ]
        );
    }

    public function panel_manage_users()
    {
        $tool = tools();
        $Users = AllUsers::execute();
        $Admins = AllUsers::execute3();

        if (isset($_GET['search'])) {
            $title = $_GET['search'];
            $Users = SearchUser::execute2($title);
            $Admins = SearchAdmin::execute($title);
        }

        Flight::render(
            directory_separator("Panel", "manageuser.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                'admin_count' => $tool['admincount'],
                'user_count' => $tool['usercount'],
                "admin" => $tool['admin'],
                "users" => $Users,
                "admins" => $Admins
            ]
        );
    }

    public function panel_manage_account()
    {
        $tool = tools();
        Flight::render(
            directory_separator("Panel", "account.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                'admin_count' => $tool['admincount'],
                'user_count' => $tool['usercount'],
                "admin" => $tool['admin']
            ]
        );
    }

    public function panel_search_users(string $title = "")
    {
        if (isset($_GET['search']))
            $title = $_GET['search'];
        $tool = tools();
        $Users = SearchUser::execute($title);
        Flight::render(
            directory_separator("Panel", "search-result-users.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "users" => $Users
            ]
        );
    }
}