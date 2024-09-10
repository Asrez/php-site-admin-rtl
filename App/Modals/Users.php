<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class Users
{
    public static function Delete(int $id)
    {

    }

    public static function Update(array $data)
    {

    }

    public static function Create(array $data) :bool
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "INSERT INTO `users`(`id`, `name`, `username`, `email`, `password`, `state`) VALUES (NULL, :name, :username, :email, :password, :state);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("name", $data['name']);
        $stmt->bindParam("username", $data['username']);
        $stmt->bindParam("email", $data['email']);
        $stmt->bindParam("password", $data['password']);
        $stmt->bindParam("state", $data['state']);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['admin_id'] = $row['id'];

            return true;
        } else
            return false;
    }

    public static function GetById(int $id) : array
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

    public static function GetAllUsers() : array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `state`= 0";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetAllAdmins() : array
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT * FROM `users` WHERE `id`= :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}