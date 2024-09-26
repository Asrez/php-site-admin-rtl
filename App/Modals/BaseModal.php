<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class BaseModal
{
    public static function getDbConnection(): PDO
    {
        return Connect::getInstance()->getConnection();
    }
}
