<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;
class Settings
{
    public static function Delete(int $id)
    {

    }

    public static function Update(array $data)
    {
        
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