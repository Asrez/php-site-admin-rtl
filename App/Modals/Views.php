<?php

namespace App\Modals;

use PDO;
use App\Database\Connect;

class Views
{

    public static function Create(array $data)
    {

    }

    public static function Count(): int
    {
        $db = Connect::getInstance()->getConnection();

        $sql = "SELECT Count(*) as count FROM `views` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt['count'];
    }
}