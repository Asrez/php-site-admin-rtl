<?php

namespace App\Controllers;

use App\Modals\Posts;
use Exception;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

use App\Actions\Comments\AllComments;
use App\Actions\Comments\ConfirmComments;
use App\Actions\Comments\DeleteComment;


class CommentController
{
    public function panel_manage_comment()
    {
        $tool = tools();
        $comments = AllComments::execute();
        Flight::render(
            directory_separator("Panel", "managecomment.php"),
            [
                "logo" => $tool['logo'],
                "footer" => $tool['footer'],
                "title" => $tool['title'],
                "admin" => $tool['admin'],
                "comments" => $comments
            ],
        );
    }

    public function panel_result_delete_comment(int $id)
    {
        DeleteComment::execute($id);
        flight::redirect("/panel/manage/comments?delete=true");
    }

    public function panel_result_confirm_comment(int $id)
    {
        ConfirmComments::execute($id);
        flight::redirect("/panel/manage/comments?confirm=true");
    }
}