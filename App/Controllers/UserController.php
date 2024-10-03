<?php

namespace App\Controllers;

use App\Actions\Search\SearchAdmin;
use App\Actions\Search\SearchUser;
use App\Actions\Users\AllUsers;
use App\Actions\Users\UpdateUser;
use App\Actions\Users\GetByIdUser;
use App\Actions\Users\DeleteUser;
use App\Actions\Users\SetAdminUser;
use App\Actions\Users\CreateUser;
use App\Actions\Users\Login_panel;
use Flight;
use Exception;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class UserController
{
    public function panel_login(): void
    {
        try {
            Flight::render(directory_separator("Panel", "login.php"));
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_logout()
    {
        session_unset();
        session_destroy();
    }

    public function panel_result_login(): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btnlogin'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $result = Login_panel::execute($username, $password);

                if ($result === true) {
                    Flight::redirect("/panel/login?login=true");
                } else {
                    Flight::redirect("/panel/login?login=false");
                }

            }
        } else {
            Flight::redirect("/panel/login?login=nofill");
        }

    }

    public function panel_signup(): void
    {
        try {
            Flight::render(directory_separator("Panel", "signup.php"));
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_result_signup(): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
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
                    "state" => 1,
                    "image" => "default.png",
                ];

                $result = CreateUser::execute($data);

                if ($result === true) {
                    Flight::redirect("/panel/signup?signup=true");
                } else if ($result === false) {
                    Flight::redirect("/panel/signup?signup=false");
                }

            }
        } else {
            Flight::redirect("/panel/signup?signup=nofill");
        }

    }

    public function panel_users(): void
    {
        $tool = tools();
        $Users = AllUsers::execute2();

        try {
            Flight::render(
                directory_separator("Panel", "users.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    'admin_count' => $tool['admincount'],
                    'user_count' => $tool['usercount'],
                    "admin" => $tool['admin'],
                    "users" => $Users,
                    "tab" => "users"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_manage_users(): void
    {
        $tool = tools();
        $Users = AllUsers::execute();
        $Admins = AllUsers::execute3();

        if (isset($_GET['search'])) {
            $title = $_GET['search'];
            $Users = SearchUser::execute2($title);
            $Admins = SearchAdmin::execute($title);
        }

        try {
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
                    "admins" => $Admins,
                    "tab" => "manage"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_manage_account(): void
    {
        $tool = tools();
        try {
            Flight::render(
                directory_separator("Panel", "account.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    'admin_count' => $tool['admincount'],
                    'user_count' => $tool['usercount'],
                    "admin" => $tool['admin'],
                    "tab" => "manage"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_search_users(string $title = ""): void
    {
        if (isset($_GET['search'])) {
            $title = $_GET['search'];
        }

        $tool = tools();
        $Users = SearchUser::execute($title);

        try {
            Flight::render(
                directory_separator("Panel", "search-result-users.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "users" => $Users,
                    "tab" => "home"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_result_create_user(): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'name' => [],
            'username' => ['required'],
            'password' => ['required'],
            'repassword' => ['required'],
            'type' => [],
            'email' => []
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_new_user'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $repassword = md5($_POST['repassword']);
                if ($password !== $repassword) {
                    Flight::redirect("/panel/manage/users?user_add=pass_error");
                }
                $state = $_POST['type'];
                $name = $_POST['name'];
                $email = $_POST['email'];

                $image = basename($_FILES["image"]["name"]);
                if ($image === "") {
                    $image = "default.png";
                }

                $target_file = "./static/avatars/" . $image;
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
                $data = [
                    "name" => $name,
                    "username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "state" => $state,
                    "image" => $image,
                ];

                $result = CreateUser::execute($data);
                Flight::redirect("/panel/manage/users?user_add=true");
                if ($result === false) {
                    Flight::redirect("/panel/manage/users?user_add=false");
                }

            }
        } else {
            Flight::redirect("/panel/manage/users?user_add=nofill");
        }

    }

    public function panel_result_update_user(int $id): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'name' => [],
            'username' => ['required'],
            'password' => ['required'],
            'email' => []
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_update_user'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $real_password = GetByIdUser::execute($id)['password'];

                if ($real_password !== $password) {
                    Flight::redirect("/panel/manage/users?userupdate=pass_error");
                    exit();
                }
                if (!empty($_POST['new_password']) && !empty($_POST['new_repassword'])) {
                    if ($_POST['new_password'] === $_POST['new_repassword']) {
                        $password = md5($_POST['new_password']);
                    } else {
                        Flight::redirect("/panel/manage/users?userupdate=pass_error");
                        exit();
                    }
                }

                $name = $_POST['name'];
                $email = $_POST['email'];

                $image = basename($_FILES["image"]["name"]);
                if ($image === "") {
                    $image = GetByIdUser::execute($id)['image'];
                }

                $target_file = "./static/avatars/" . $image;
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
                $data = [
                    "name" => $name,
                    "username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "image" => $image,
                    "id" => $id
                ];

                $result = UpdateUser::execute($data);
                Flight::redirect("/panel/manage/users?userupdate=true");
                if ($result === false) {
                    Flight::redirect("/panel/manage/users?userupdate=false");
                }

            }
        } else {
            Flight::redirect("/panel/manage/users?userupdate=nofill");
        }

    }

    public function panel_result_account(): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'name' => [],
            'username' => ['required'],
            'password' => ['required'],
            'email' => []
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btnaccount'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $real_password = GetByIdUser::execute($_SESSION['admin_id'])['password'];

                if ($real_password !== $password) {
                    Flight::redirect("/panel/manage/users?updateyou=pass_error");
                    exit();
                }
                if (!empty($_POST['new_password']) && !empty($_POST['new_password2'])) {
                    if ($_POST['new_password'] === $_POST['new_repassword']) {
                        $password = md5($_POST['new_password']);
                    } else {
                        Flight::redirect("/panel/manage/users?updateyou=pass_error");
                        exit();
                    }
                }

                $name = $_POST['name'];
                $email = $_POST['email'];

                $image = basename($_FILES["image"]["name"]);
                if ($image === "") {
                    $image = GetByIdUser::execute($_SESSION['admin_id'])['image'];
                }

                $target_file = "./static/avatars/" . $image;
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
                $data = [
                    "name" => $name,
                    "username" => $username,
                    "password" => $password,
                    "email" => $email,
                    "image" => $image,
                    "id" => $_SESSION['admin_id']
                ];

                $result = UpdateUser::execute($data);
                Flight::redirect("/panel/manage/users?updateyou=true");
                if ($result === false) {
                    Flight::redirect("/panel/manage/users?updateyou=false");
                }

            }
        } else {
            Flight::redirect("/panel/manage/users?updateyou=nofill");
        }

    }
    public function panel_result_delete_user(int $id)
    {
        DeleteUser::execute($id);
        Flight::redirect("/panel/manage/users?userdelete=true");

    }

    public function panel_result_set_admin_user(int $id)
    {
        SetAdminUser::execute($id);
        Flight::redirect("/panel/manage/users?setadmin=true");

    }

    public function panel_show_user(int $id): void
    {
        $tool = tools();
        $user = GetByIdUser::execute($id);
        try {
            Flight::render(
                directory_separator("Panel", "user.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "user" => $user,
                    "tab" => "home"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }
}
