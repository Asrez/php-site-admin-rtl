<?php

namespace App\Modals;

use App\Database\Connect;
use Exception;
use PDO;

class Users
{
    public static function Delete(int $id)
    {

    }

    public static function Update(array $data)
    {

    }

    public static function Create(array $data)
    {
        $date = date("Y-m-d");
        try {
            $db = Connect::getInstance()->getConnection();

            $sql = "INSERT INTO `users`(`id`, `name`, `username`, `email`, `password`, `image`, `date`, `state`) VALUES (null, :name, :username, :email, :password, :image, :date, :state);";

            $stmt = $db->prepare($sql);
            $stmt->bindParam("name", $data['name']);
            $stmt->bindParam("username", $data['username']);
            $stmt->bindParam("email", $data['email']);
            $stmt->bindParam("image", $data['image']);
            $stmt->bindParam("password", $data['password']);
            $stmt->bindParam("date", $date);
            $stmt->bindParam("state", $data['state']);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['admin_id'] = $row['id'];
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetById(int $id): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `id`= :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function Login(string $username, string $password): bool
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password AND `state` = 1;";

        $stms = $db->prepare($sql);
        $stms->bindParam('password', $password);
        $stms->bindParam('username', $username);
        $stms->execute();

        if ($row = $stms->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['admin_id'] = $row['id'];
            $result = true;
        } else {
            $result = false;
        }

        return $result;

    }

    public static function GetAllUsers(): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `state`= 0;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetAll(): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetAllAdmins(): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `state`= 1";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Count(): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT Count(*) as count FROM `users` WHERE `state` = 0;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql1 = "SELECT Count(*) as count FROM `users` WHERE `state` = 1;";

        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $stmt1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        return ["count_user" => $stmt['count'], "count_admin" => $stmt1['count']];
    }

    public static function Get_In_Month(string $date): array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT `date`,Count(*) as count FROM `users` WHERE `date` >= :date GROUP BY date;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("date", $date);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
