<?php

namespace App\Controllers;

use App\Actions\Posts\AllPosts;
use App\Actions\Posts\CreatePost;
use App\Actions\Posts\NotConfirmed;
use App\Actions\Search\SearchPost;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;
use App\Actions\Settings\GetByKeySetting;
use App\Actions\Settings\GetByStateSetting;
use App\Actions\Posts\CountPost;
use App\Actions\Posts\Innerjoin;
use App\Actions\Users\AllUsers;
use App\Actions\Posts\Mostvisit;
use App\Actions\Comments\NotConfirmedComment;
use App\Actions\Comments\AllComments;
use App\Actions\Comments\CountComment;
use App\Actions\Views\CountView;
use App\Actions\Users\CountUser;
use App\Actions\Users\Get_In_MonthUser;
use App\Actions\Users\Count_Date_User;
use App\Actions\Users\GetByIdUser;
use App\Actions\Search\SearchAll;
use App\Actions\Search\SearchUser;
use App\Actions\Search\SearchAdmin;
class PostController
{

    public function panel_posts()
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
                "admin" => $tool['admin'],
                "posts" => $All_post,
            ]
        );
    }

    public function panel_manage_posts()
    {
        $tool = tools();
        $All_post = AllPosts::execute();
        if (isset($_GET['search'])) {
            $All_post = SearchPost::execute($_GET['search']);
        }

        Flight::render(
            directory_separator("Panel", "managepost.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "posts" => $All_post,
            ]
        );
    }

    public function panel_search_posts(string $title = "")
    {
        $tool = tools();
        $Posts = SearchPost::execute($title);
        Flight::render(
            directory_separator("Panel", "search-result-post.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "admin" => $tool['admin'],
                "posts" => $Posts,
            ]
        );
    }
    public function panel_result_create_post()
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'title' => ['required'],
            'content' => ['required'],
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_new_post'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = basename($_FILES["image"]["name"]);
                if ($image === "") {
                    $image = "1.jpg";
                }

                $target_file = "./static/photos/" . $image;
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }

                $data = [
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                ];

                $result = CreatePost::execute($data);

                if ($result) {
                    Flight::redirect("/panel/manage/posts?postadd=true");
                }

            }
        } else {
            Flight::redirect("/panel/manage/posts?postadd=nofill");
        }

    }
}
