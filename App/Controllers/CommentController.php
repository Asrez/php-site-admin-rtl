<?php

namespace App\Controllers;

use Flight;
use Exception;

use App\Actions\Comments\AllComments;
use App\Actions\Comments\ConfirmComments;
use App\Actions\Comments\DeleteComment;


class CommentController
{
    public function panel_manage_comment(): void
    {
        $tool = tools();
        $comments = AllComments::execute();
        try {
            Flight::render(
                directory_separator("Panel", "managecomment.php"),
                [
                    "logo" => $tool['logo'],
                    "footer" => $tool['footer'],
                    "title" => $tool['title'],
                    "admin" => $tool['admin'],
                    "comments" => $comments,
                    "tab" => "manage"
                ],
            );
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    public function panel_result_delete_comment(int $id): void
    {
        DeleteComment::execute($id);
        flight::redirect("/panel/manage/comments?commentdelete=true");
    }

    public function panel_result_confirm_comment(int $id): void
    {
        ConfirmComments::execute($id);
        flight::redirect("/panel/manage/comments?commentconfirm=true");
    }
}