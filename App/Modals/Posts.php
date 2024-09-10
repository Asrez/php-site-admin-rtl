<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;

class Posts
{
    public static function Delete(int $id)
    {

    }

    public static function Update(array $data)
    {
        
    }

    public static function Create(array $data)
    {
        
    }
    
    public static function GetById(int $id)
    {
        
    }

    public static function GetBySlug(string $slug)
    {
        
    }
    
    public static function Innerjoin()
    {
        $db = Connect::getInstance()->getConnection();

        $sql = 'SELECT `users`.`id` ,
        `users`.`image` as `userimage` ,
        `users`.`username` ,
        `posts`.`title` ,
        `posts`.`id` as `post_id`,
        `posts`.`date`
        FROM `posts`
        INNER JOIN `users` ON `posts`.`admin_id` = `users`.`id` ;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Mostvisit()
    {
        $db = Connect::getInstance()->getConnection();

        $sql = 'SELECT * FROM `posts` ORDER BY `viewcount` DESC;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function NotConfirmed()
    {
        $db = Connect::getInstance()->getConnection();

        $sql = 'SELECT * FROM `posts` WHERE `state` = 0;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }
}