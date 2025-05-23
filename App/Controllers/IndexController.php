<?php

namespace App\Controllers;

use Flight;
use Exception;

use App\Actions\Posts\CountPost;
use App\Actions\Posts\AllPosts;
use App\Actions\Posts\Innerjoin;
use App\Actions\Posts\Post_in_month;
use App\Actions\Users\AllUsers;
use App\Actions\Posts\Mostvisit;
use App\Actions\Posts\NotConfirmed;
use App\Actions\Comments\NotConfirmedComment;
use App\Actions\Comments\AllComments;
use App\Actions\Users\Get_In_MonthUser;
use App\Actions\Search\SearchAll;


class IndexController
{
    public static function panel_user_chart(): array
    {
        $year = date(format: "Y");
        $day = date("d");
        $month = date("m");
        $last_month = $month - 1;
        $date1 = date($year . $day . $last_month);

        $user_chart_count = [];
        $user_chart_date = [];

        $array = Get_In_MonthUser::execute($date1);
        foreach ($array as $filed) {
            $user_chart_count[] = $filed['count'];
            $user_chart_date[] = $filed['date'];
        }
        return [$user_chart_count, $user_chart_date];
    }

    public static  function panel_post_chart(): array
    {
        $year = date(format: "Y");
        $day = date("d");
        $month = date("m");
        $last_month = $month - 1;
        $date1 = date($year . $day . $last_month);
 
        $array2 = Post_in_month::execute($date1);
        $all_my_post = 0;
        $post_chart_count = [];
        $post_chart_date = [];

        foreach ($array2 as $filed1) {
            $post_chart_count[] = $filed1['count'];
            $post_chart_date[] = $filed1['date'];
            $all_my_post += $filed1['count'];
        }

        return [$post_chart_count, $post_chart_date,$all_my_post];
    }

    public static  function panel_all_post_chart(): array
    {
        $All_post = AllPosts::execute();
        $view_count_chart = [];
        $title_chart = [];

        foreach ($All_post as $view) {
            $view_count_chart[] = $view['viewcount'];
            $title_chart[] = $view['id'];
        }

        return [$view_count_chart, $title_chart,$All_post];
    }

    public static  function panel_comment_chart(): array
    {
        $AllCommentss = AllComments::execute();
        $AllComments["comment_post_id"] = [];
        $AllComments["comment_title"] = [];
        $AllComments["comment_user_id"] = [];
        
        foreach ($AllCommentss as $comment) {
            $AllComments["comment_post_id"][] = $comment['post_id'];
            $AllComments["comment_title"][] = $comment['title'];
            $AllComments["comment_user_id"][] = $comment['user_id'];
        }

        return $AllComments;
    }

    public function panel_index(): void
    {
        $user_chart = IndexController::panel_user_chart();
        $post_chart = IndexController::panel_post_chart();
        $all_post_chart = IndexController::panel_all_post_chart();
        $comment_chart = IndexController::panel_comment_chart();
        
        $tool = tools();
        $admin_activity = Innerjoin::execute();
        $Users = AllUsers::execute();
        $MostVisit = Mostvisit::execute();
        $Not_confirmed = NotConfirmed::execute();
        $Not_Confirmed_Comment = NotConfirmedComment::execute();
        $postnoconfirmed = CountPost::execute()['count_no_confirmed'];

        $not_confirmed_percent = ($postnoconfirmed * 100) / $tool['postcount'];

        $not_confirmed_comment_percent = (count($Not_Confirmed_Comment) * 100) / $tool['commentcount'];

        try {
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
                    "user_chart_date" => $user_chart[1],
                    "user_chart_count" => $user_chart[0],
                    "view_count_chart" => $all_post_chart[0],
                    "title_chart" => $all_post_chart[1],
                    "not_confirmed_comment_percent" => $not_confirmed_comment_percent,
                    "AllComments" => $comment_chart,
                    "posts" => $all_post_chart[2],
                    "post_chart_count" => $post_chart[0],
                    "post_chart_date" => $post_chart[1],
                    "all_my_post" => $post_chart[2],
                    "tab" => "home"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_search_all(string $title = ""): void
    {

        $tool = tools();
        $All = SearchAll::execute($title);
        try {
            Flight::render(
                directory_separator("Panel", "search-results.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "posts" => $All['posts'],
                    "users" => $All['users'],
                    "tab" => "home"
                ],
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }
}