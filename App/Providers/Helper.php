<?php

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Posts\CountPost;
use App\Actions\Comments\CountComment;
use App\Actions\Views\CountView;
use App\Actions\Users\CountUser;
use App\Actions\Users\GetByIdUser;

function directory_separator(string $folder, string $file_name): string
{
    $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $file_name;

    return $path;
}

function tools(): array
{

    $logo = GetByKeySetting::execute('logo');
    $footer = GetByKeySetting::execute('footer');
    $title = GetByKeySetting::execute('title');
    $countadminuser = CountUser::execute();
    $admincount = $countadminuser['count_admin'];
    $usercount = $countadminuser['count_user'];
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

function makeRandomSlug(): string
{
    
    $length = 8;
    $characters = 'abcdefghijklmnopqrstuvwxyzZXCVBNMASDFGHJKLQWERTYUIOP%$#@!^*+-0123456789';
    
    $randomSlug = '';
    for ($i = 0; $i < $length; $i++) {
        $randomSlug .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $randomSlug;
}