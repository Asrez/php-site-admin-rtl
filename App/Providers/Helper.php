<?php

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
function directory_separator(string $folder, string $file_name)
{
    $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $file_name;

    return $path;
}
function tools()
{

    $logo = GetByKeySetting::execute('logo');
    $footer = GetByKeySetting::execute('footer');
    $title = GetByKeySetting::execute('title');
    $admincount = CountUser::execute()['count_admin'];
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
    $year = date("Y");
    $day = date("d");
    $month = date("m");
    $last_month = $month - 1;
    $date1 = date($year . $day . $last_month);
    $array = Get_In_MonthUser::execute($date1);

    foreach ($array as $filed) {
        $array2 = Count_Date_User::execute($filed['date']);
        $user_chart_count[] = $array2;
        $user_chart_date[] = $filed['date'];
    }
    $All_post = AllPosts::execute();
    foreach ($All_post as $view) {
        $view_count_chart[] = $view['viewcount'];
        $title_chart[] = $view['id'];
    }

    $tool = tools();
    $admin_activity = Innerjoin::execute();
    $Users = AllUsers::execute();
    $MostVisit = Mostvisit::execute();
    $Not_confirmed = NotConfirmed::execute();
    $Not_Confirmed_Comment = NotConfirmedComment::execute();

    $postnoconfirmed = CountPost::execute()['count_no_confirmed'];

    $not_confirmed_percent = ($postnoconfirmed * 100) / $tool['postcount'];

    $not_confirmed_comment_percent = (count($Not_Confirmed_Comment) * 100) / $tool['commentcount'];

    $AllCommentss = AllComments::execute();
    foreach ($AllCommentss as $comment) {
        $AllComments["comment_post_id"][] = $comment['post_id'];
        $AllComments["comment_title"][] = $comment['title'];
        $AllComments["comment_user_id"][] = $comment['user_id'];
    }


    Flight::render(
        directory_separator("Panel", "index.php"),
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
            "Not_Confirmed_Comment" => $Not_Confirmed_Comment,
            "not_confirmed_percent" => $not_confirmed_percent,
            "user_chart_date" => $user_chart_date,
            "user_chart_count" => $user_chart_count,
            "view_count_chart" => $view_count_chart,
            "title_chart" => $title_chart,
            "not_confirmed_comment_percent" => $not_confirmed_comment_percent,
            "AllComments" => $AllComments ,
            "posts" => $All_post
        ]
    );
}

function panel_manage_setting(array $admin)
{
    $tool = tools();
    $settings = GetByStateSetting::execute("setting");
    Flight::render(
        directory_separator("Panel", "managesetting.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            "admin" => $admin,
            "settings" => $settings
        ]
    );;
}

function panel_manage_advers(array $admin)
{
    $tool = tools();
    $advers = GetByStateSetting::execute("adver");
    Flight::render(
        directory_separator("Panel", "manageadvers.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            "admin" => $admin,
            "advers" => $advers
        ]
    );;
}

function panel_login()
{
    Flight::render(directory_separator("Panel", "login.php"));
}

function panel_signup()
{
    Flight::render(directory_separator("Panel", "signup.php"));
}

function panel_users(array $admin)
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
            "admin" => $admin,
            "users" => $Users
        ]
    );
}

function panel_manage_users(array $admin)
{
    $tool = tools();
    $Users = AllUsers::execute();
    $Admins = AllUsers::execute3();
    Flight::render(
        directory_separator("Panel", "manageuser.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            'admin_count' => $tool['admincount'],
            'user_count' => $tool['usercount'],
            "admin" => $admin,
            "users" => $Users,
            "admins" => $Admins
        ]
    );
}

function panel_manage_account(array $admin)
{
    $tool = tools();
    $Users = AllUsers::execute();
    $Admins = AllUsers::execute3();
    Flight::render(
        directory_separator("Panel", "account.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            'admin_count' => $tool['admincount'],
            'user_count' => $tool['usercount'],
            "admin" => $admin
        ]
    );
}
function panel_posts(array $admin)
{
    $tool = tools();
    $All_post = AllPosts::execute();
    $Not_confirmed = count(NotConfirmed::execute());
    Flight::render(
        directory_separator("Panel", "posts.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            'post_count' => $tool['postcount'],
            'user_count' => $tool['usercount'],
            "not_confirmed_pages" => $Not_confirmed,
            "admin" => $admin,
            "posts" => $All_post
        ]
    );
}

function panel_manage_posts(array $admin)
{
    $tool = tools();
    $All_post = AllPosts::execute();
    Flight::render(
        directory_separator("Panel", "managepost.php"),
        [
            "logo" => $tool['logo'],
            "footer" => $tool['footer'],
            "title" => $tool['title'],
            "admin" => $admin,
            "posts" => $All_post
        ]
    );
}