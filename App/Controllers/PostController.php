<?php

namespace App\Controllers;

use App\Actions\Posts\AllPosts;
use App\Actions\Posts\CreatePost;
use App\Actions\Posts\GetByIdPost;
use App\Actions\Posts\UpdatePost;
use App\Actions\Posts\NotConfirmed;
use App\Actions\Posts\Confirm_Post;
use App\Actions\Posts\DeletePost;
use App\Actions\Search\SearchPost;
use Flight;
use Exception;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class PostController
{

    public function panel_posts(): void
    {
        $tool = tools();
        $All_post = AllPosts::execute();
        $Not_confirmed = count(NotConfirmed::execute());
        try {
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
                    "tab" => "posts"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_manage_posts(): void
    {
        $tool = tools();
        $All_post = AllPosts::execute();
        if (isset($_GET['search'])) {
            $All_post = SearchPost::execute($_GET['search']);
        }
        try {
            Flight::render(
                directory_separator("Panel", "managepost.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "posts" => $All_post,
                    "tab" => "manage"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_search_posts(string $title = ""): void
    {
        $tool = tools();
        if (isset($_GET['search'])) {
            $title = $_GET['search'];
        }

        $Posts = SearchPost::execute($title);

        try {
            Flight::render(
                directory_separator("Panel", "search-result-post.php"),
                [
                    "logo" => $tool['logo'],
                    "title" => $tool['title'],
                    "footer" => $tool['footer'],
                    "admin" => $tool['admin'],
                    "posts" => $Posts,
                    "tab" => "home"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_result_create_post(): void
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

    public function panel_result_update_post(int $id): void
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'title' => ['required'],
            'content' => ['required'],
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_update_post'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = basename($_FILES["image"]["name"]);
                if ($image === "") {
                    $image = GetByIdPost::execute($id)['image'];
                }

                $target_file = "./static/photos/" . $image;
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }

                $data = [
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                    'id' => $id,
                ];

                UpdatePost::execute($data);
                Flight::redirect("/panel/manage/posts?postupdate=true");

            }
        } else {
            Flight::redirect("/panel/manage/posts?postupdate=nofill");
        }

    }

    public function panel_result_confirm_post(int $id): void
    {
        Confirm_Post::execute($id);
        Flight::redirect("/panel/manage/posts?confirm=true");

    }

    public function panel_result_delete_post(int $id): void
    {
        DeletePost::execute($id);
        Flight::redirect("/panel/manage/posts?postdelete=true");

    }

    public function panel_show_post(int $id): void
    {
        $tool = tools();
        $post = GetByIdPost::execute($id);
        try {
            Flight::render(
                directory_separator("Panel", "post.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "post" => $post,
                    "tab" => "home"
                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

}
