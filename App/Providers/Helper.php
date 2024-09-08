<?php

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Posts\CountPost;
use App\Actions\Users\CountUser;
function directory_separator(string $folder, string $file_name)
{
    $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$file_name;
    
    return $path;
}
function tools()
{

    $logo = GetByKeySetting::execute('logo');
    $logo_footer = GetByKeySetting::execute('logo_footer');
    $footer = GetByKeySetting::execute('footer');
    $title = GetByKeySetting::execute('title');
    $posts = GetAllPost::execute();
    $countadmin = CountUser::execute()['count'];
    $countpost = CountPost::execute()['count'];
    $countuser = CountUser::execute()['count'];
    $users = GetAllUser::execute();
    $settings = Settings::execute();

    return [
        'logo' => $logo,
        'logo_footer' => $logo_footer,
        'footer' => $footer,
        'title' => $title,
        'countadmin' => $countadmin,
        'countpost' => $countpost,
        'countuser' => $countuser,
        'posts' => $posts,
        'users' => $users,
        'settings' => $settings,
    ];
}

function panel_index()
{
    Flight::render(directory_separator("Panel", "index.php"));
}

function panel_manage_setting()
{
    Flight::render(directory_separator("Panel", "setting.php"));
}