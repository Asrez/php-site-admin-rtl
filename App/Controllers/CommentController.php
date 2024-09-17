<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

use App\Actions\Settings\GetByKeySetting;
use App\Actions\Settings\GetByStateSetting;
use App\Actions\Posts\CountPost;
use App\Actions\Posts\AllPosts;
use App\Actions\Posts\Innerjoin;
use App\Actions\Posts\Count_Post_In_Day;
use App\Actions\Posts\Post_in_month;
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


class CommentController
{
}