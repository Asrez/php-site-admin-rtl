<?php

namespace App\Modals;

use PDO;

class Views
{
    public static function Count(): int
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT COUNT(*) as count FROM `views` ;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt['count'];
    }
}