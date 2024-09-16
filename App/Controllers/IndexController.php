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


class IndexController
{
    public function panel_index()
    {
        $year = date(format: "Y");
        $day = date("d");
        $month = date("m");
        $last_month = $month - 1;
        $date1 = date($year . $day . $last_month);

        $array = Get_In_MonthUser::execute($date1);
        foreach ($array as $filed) {
            $user_chart_count[] = $filed['count'];
            $user_chart_date[] = $filed['date'];
        }

        $array2 = Post_in_month::execute($date1);
        $all_my_post = 0;
        foreach ($array2 as $filed1) {
            $post_chart_count[] = $filed1['count'];
            $post_chart_date[] = $filed1['date'];
            $all_my_post += $filed1['count'];
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
                "admin_count" => $tool['admincount'],
                "user_count" => $tool['usercount'],
                "post_count" => $tool['postcount'],
                "view_count" => $tool['viewcount'],
                "comment_count" => $tool['commentcount'],
                "admin" => $tool['admin'],
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
                "AllComments" => $AllComments,
                "posts" => $All_post,
                "post_chart_count" => $post_chart_count,
                "post_chart_date" => $post_chart_date,
                "all_my_post" => $all_my_post
            ]
        );
    }

    public function panel_manage_setting()
    {
        $tool = tools();
        $settings = GetByStateSetting::execute("setting");
        Flight::render(
            directory_separator("Panel", "managesetting.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "settings" => $settings
            ]
        );
    }

    public function panel_manage_advers()
    {
        $tool = tools();
        $advers = GetByStateSetting::execute("adver");
        Flight::render(
            directory_separator("Panel", "manageadvers.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "advers" => $advers
            ]
        );
    }

    public function panel_search_all(string $title = "")
    {

        $tool = tools();
        $All = SearchAll::execute($title);
        Flight::render(
            directory_separator("Panel", "search-results.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "posts" => $All['posts'],
                "users" => $All['users'],
            ],
        );
    }
}