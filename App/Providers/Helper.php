<?php

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Posts\CountPost;
use App\Actions\Posts\Innerjoin;
use App\Actions\Users\AllUsers;
use App\Actions\Posts\Mostvisit;
use App\Actions\Posts\NotConfirmed;
use App\Actions\Comments\NotConfirmedComment;
use App\Actions\Comments\CountComment;
use App\Actions\Views\CountView;
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
    $admincount = CountUser::execute()['count_user'];
    $usercount = CountUser::execute()['count_user'];
    $postcount = CountPost::execute()['count_all'];
    $commentcount = CountComment::execute();
    $viewcount = CountView::execute();

    return [
        'logo' => $logo,
        'footer' => $footer,
        'title' => $title,
        'admincount' => $admincount,
        'usercount' => $usercount,
        'postcount' => $postcount,
        'viewcount' => $viewcount,
        'commentcount' => $commentcount
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
    $MostVisit = Mostvisit::execute();
    $Not_confirmed = NotConfirmed::execute();
    $Not_Confirmed_Comment = NotConfirmedComment::execute();

    $postcount = CountPost::execute()['count_all'];
    $postnoconfirmed = CountPost::execute()['count_no_confirmed'];
    
    $not_confirmed_percent = ($postnoconfirmed*100)/$postcount;
    Flight::render(directory_separator("Panel", "index.php"),
    [
        "logo" => $tool['logo'],
        "footer" => $tool['footer'],
        "title" => $tool['title'],
        'admin_count' => $tool['admincount'],
        'user_count' => $tool['usercount'],
        'post_count' => $tool['postcount'],
        'view_count' => $tool['viewcount'],
        'comment_count' => $tool['commentcount'],
        "admin" => $admin,
        "admin_activity" => $admin_activity,
        "users" => $Users,
        "most_visit_pages" => $MostVisit,
        "not_confirmed_pages" => $Not_confirmed,
        "Not_Confirmed_Comment" => $Not_Confirmed_Comment ,
        "not_confirmed_percent" => $not_confirmed_percent
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