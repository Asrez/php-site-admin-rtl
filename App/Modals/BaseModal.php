<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class BaseModal
{
    protected static function getDbConnection(): PDO
    {
        return Connect::getInstance()->getConnection();
    }
}
