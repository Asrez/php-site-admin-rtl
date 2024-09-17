<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;
class Settings
{
    public static function Delete(int $id)
    {

    }

    public static function Update(array $data): void
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "UPDATE `comments` SET `title`=:title,`comment`=:comment WHERE `id` = :id;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("title", $data['title']);
        $stmt->bindParam("comment", $data['comment']);
        $stmt->bindParam("id", $data['id']);
        $stmt->execute();
        
    }

    public static function GetByKey(string $key)
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `settings` WHERE `key_setting`= :key";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("key", $key);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function GetByState(string $state)
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `settings` WHERE `type`= :state";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("state", $state);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}