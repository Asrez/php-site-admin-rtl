<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;
class Comments
{
    public static function Delete(int $id)
    {

    }

    public static function Confirmed(int $id)
    {
        
    }

    public static function NotConfirmed() : array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `comments` WHERE `state` = 0 ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetAll() : array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `comments` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Count() : int
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT Count(*) as count FROM `comments` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt['count'];
    }

    public static function Creat(array $data)
    {
        
    }
}