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
use App\Actions\Search\SearchAll;
use App\Actions\Search\SearchPost;
use App\Actions\Search\SearchUser;
use App\Actions\Search\SearchAdmin;
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
    $admin = GetByIdUser::execute($_SESSION['admin_id']);

    return [
        'logo' => $logo,
        'footer' => $footer,
        'title' => $title,
        'admincount' => $admincount,
        'usercount' => $usercount,
        'postcount' => $postcount,
        'viewcount' => $viewcount,
        'commentcount' => $commentcount,
        'admin' => $admin
    ];
}

