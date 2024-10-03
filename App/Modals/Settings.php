<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;
class Settings
{
    public static function Delete(int $id): void
    {
        $db = BaseModal::getDbConnection();

        $sql = "UPDATE `settings` SET `value_setting`= '',`link`= '',`title`= '',`text`= '' WHERE id = :id;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();

    }

    public static function Update(array $data): void
    {
        $db = BaseModal::getDbConnection();

        $sql = "UPDATE `settings` SET `value_setting`= :value,`link`= :link,`title`= :title,`text`=:text WHERE id = :id;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("title", $data['title']);
        $stmt->bindParam("text", $data['text']);
        $stmt->bindParam("link", $data['link']);
        $stmt->bindParam("value", $data['value_setting']);
        $stmt->bindParam("id", $data['id']);
        $stmt->execute();

    }

    public static function Update2(array $data): void
    {
        $db = BaseModal::getDbConnection();

        $sql = "UPDATE `settings` SET `value_setting`= :value,`link`= :link,`title`= :title WHERE id = :id;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("title", $data['title']);
        $stmt->bindParam("link", $data['link']);
        $stmt->bindParam("value", $data['value_setting']);
        $stmt->bindParam("id", $data['id']);
        $stmt->execute();

    }

    public static function GetByKey(string $key): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `settings` WHERE `key_setting`= :key;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("key", $key);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function GetByState(string $state): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `settings` WHERE `type`= :state;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("state", $state);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}