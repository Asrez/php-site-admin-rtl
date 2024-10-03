<?php

namespace App\Modals;

use Exception;
use PDO;
use App\Modals\BaseModal;
class Comments
{
    public static function Delete(int $id): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "DELETE FROM `comments` WHERE `id` = :id;";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function Confirmed(int $id): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `comments` SET `state`= 1 WHERE `id` = :id;";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function NotConfirmed(): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `comments` WHERE `state` = 0;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function GetAll(): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT * FROM `comments`;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt = $stmt->fetchAll(PDO::FETCH_ASSOC))
            return $stmt;
        else
            return [];
    }

    public static function Count(): int
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT COUNT(*) as count FROM `comments`;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt['count'];
    }
}