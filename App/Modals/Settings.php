<?php

namespace App\Modals;

use PDO;
use Exception;
class Settings
{
    public static function Delete(int $id): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `settings` SET `value_setting` = '', `link` = '',`title` = '',`text` = '' WHERE id = :id;";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function Update(array $data): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `settings` SET `value_setting` = :value,`link`= :link,`title` = :title,`text` = :text WHERE id = :id;";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("title", $data['title']);
            $stmt->bindParam("text", $data['text']);
            $stmt->bindParam("link", $data['link']);
            $stmt->bindParam("value", $data['value_setting']);
            $stmt->bindParam("id", $data['id']);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function Update2(array $data): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `settings` SET `value_setting` = :value,`link` = :link,`title` = :title WHERE id = :id;";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("title", $data['title']);
            $stmt->bindParam("link", $data['link']);
            $stmt->bindParam("value", $data['value_setting']);
            $stmt->bindParam("id", $data['id']);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function GetByKey(string $key): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `settings` WHERE `key_setting` = :key;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("key", $key);
        $stmt->execute();

        if ($stmt = $stmt->fetch(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function GetByState(string $state): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `settings` WHERE `type` = :state;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("state", $state);
        $stmt->execute();

        if ($stmt = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }
}