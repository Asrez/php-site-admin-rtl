<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class PostController
{

    public function panel_posts()
    {
        return panel_posts();
    }

    public function panel_manage_posts()
    {
        if (isset($_GET['search']))
            return panel_manage_posts($_GET['search']);
        else
            return panel_manage_posts();
    }

    public function panel_search_posts()
    {
        if (isset($_GET['search']))
            return panel_search_posts($_GET['search']);
        else
            return panel_manage_posts();
    }
    public function panel_result_create_post()
    {
        $validator = new Validator(Flight::request()->data->getData(), [
            'title' => ['required'],
            'content' => ['required']
        ]);

        if ($validator->validate()) {
            if (isset($_POST['btn_new_post'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image =basename($_FILES['image'],"name");
                if ($image === "") $image = "1.jpg";

            }
        }
    }
}