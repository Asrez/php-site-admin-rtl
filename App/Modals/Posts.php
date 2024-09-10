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

    public static function Count() : array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT Count(*) as count FROM `posts` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql1 = "SELECT Count(*) as count FROM `posts` WHERE `state` = 0 ;";

        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $stmt1= $stmt1->fetch(PDO::FETCH_ASSOC);

        return ["count_all" => $stmt['count'], "count_no_confirmed" => $stmt1['count']];
    }
}