<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class Search
{
    public static function Search(string $title): array
    {
        $db = Connect::getInstance()->getConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`name` LIKE :title OR `users`.`username` LIKE :title;';

        $posts_sql = 'SELECT * FROM `posts` WHERE `posts`.`title` LIKE :title ;';

        $title = '%'.$title.'%';
        $users = $db->prepare($users_sql);
        $posts = $db->prepare($posts_sql);
        $users->bindParam('title', $title);
        $posts->bindParam('title', $title);
        $users->execute();
        $posts->execute();
        $users = $users->fetchAll(PDO::FETCH_ASSOC);
        $posts = $posts->fetchAll(PDO::FETCH_ASSOC);

        $all = ['posts' => $posts, 'users' => $users];

        return $all;
    }

    public static function SearchUser(string $title): array
    {
        $db = Connect::getInstance()->getConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`name` LIKE :title OR `users`.`username` LIKE :title;';

        $title = '%'.$title.'%';
        $users = $db->prepare($users_sql);
        $users->bindParam('title', $title);
        $users->execute();
        $users = $users->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public static function SearchPost(string $title): array
    {
        $db = Connect::getInstance()->getConnection();

        $posts_sql = 'SELECT * FROM `posts` WHERE `posts`.`title` LIKE :title ;';

        $title = '%'.$title.'%';
        $posts = $db->prepare($posts_sql);
        $posts->bindParam('title', $title);
        $posts->execute();
        $posts = $posts->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
}
