<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class Search
{
    public static function Search(string $title): array
    {
        $db = BaseModal::getDbConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`name` LIKE :title OR `users`.`username` LIKE :title;';

        $posts_sql = 'SELECT * FROM `posts` WHERE `posts`.`title` LIKE :title ;';

        $title = '%' . $title . '%';
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
        $db = BaseModal::getDbConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`name` LIKE :title OR `users`.`username` LIKE :title;';

        $title = '%' . $title . '%';
        $users = $db->prepare($users_sql);
        $users->bindParam('title', $title);
        $users->execute();
        
        if ($stmt = $users->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function SearchPost(string $title): array
    {
        $db = BaseModal::getDbConnection();

        $posts_sql = 'SELECT * FROM `posts` WHERE `posts`.`title` LIKE :title;';

        $title = '%' . $title . '%';
        $posts = $db->prepare($posts_sql);
        $posts->bindParam('title', $title);
        $posts->execute();
        
        if ($stmt = $posts->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function SearchAdmin(string $title): array
    {
        $db = BaseModal::getDbConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`username` LIKE :title And `state` = 1;';

        $title = '%' . $title . '%';
        $users = $db->prepare($users_sql);
        $users->bindParam('title', $title);
        $users->execute();
        
        if ($stmt = $users->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function SearchUser2(string $title): array
    {
        $db = BaseModal::getDbConnection();

        $users_sql = 'SELECT * FROM `users` WHERE `users`.`username` LIKE :title And `users`.`state` = 0;';

        $title = '%' . $title . '%';
        $users = $db->prepare($users_sql);
        $users->bindParam('title', $title);
        $users->execute();
        
        if ($stmt = $users->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }
}
