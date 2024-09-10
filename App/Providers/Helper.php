<?php

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Posts\CountPost;
use App\Actions\Posts\Innerjoin;
use App\Actions\Users\AllUsers;
use App\Actions\Users\CountUser;
use App\Actions\Users\GetByIdUser;
function directory_separator(string $folder, string $file_name)
{
    $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$file_name;
    
    return $path;
}
function tools()
{

    $logo = GetByKeySetting::execute('logo');
    $footer = GetByKeySetting::execute('footer');
    $title = GetByKeySetting::execute('title');
    // $posts = GetAllPost::execute();
    // $countadmin = CountUser::execute()['count'];
    // $countpost = CountPost::execute()['count'];
    // $countuser = CountUser::execute()['count'];
    // $users = GetAllUser::execute();
    // $settings = Settings::execute();

    return [
        'logo' => $logo,
    //     'logo_footer' => $logo_footer,
        'footer' => $footer,
        'title' => $title
    //     'countadmin' => $countadmin,
    //     'countpost' => $countpost,
    //     'countuser' => $countuser,
    //     'posts' => $posts,
    //     'users' => $users,
    //     'settings' => $settings,
    ];
}

function session_admin()
{
    if (isset($_SESSION['admin_id'])) {

        $admin = GetByIdUser::execute($_SESSION['admin_id']);
        $state = true;

        if ($admin['state'] === 0) {
            $state = false;
        }
    } else {
        $state = false;
    }

    if ($state === false) {
        return false;
    } else {
        return $admin;
    }
}

function panel_index(array $admin)
{
    $tool = tools();
    $admin_activity = Innerjoin::execute();
    $Users = AllUsers::execute();
    Flight::render(directory_separator("Panel", "index.php"),
    [
        "logo" => $tool['logo'],
        "footer" => $tool['footer'],
        "title" => $tool['title'],
        "admin" => $admin,
        "admin_activity" => $admin_activity,
        "users" => $Users
    ]);
}

function panel_manage_setting()
{
    Flight::render(directory_separator("Panel", "setting.php"));
}

function panel_login()
{
    Flight::render(directory_separator("Panel", "login.php"));
}

function panel_signup()
{
    Flight::render(directory_separator("Panel", "signup.php"));
}