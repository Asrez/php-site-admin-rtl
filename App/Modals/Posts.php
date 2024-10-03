<?php

namespace App\Modals;

use App\Database\Connect;
use PDO;

class Posts
{
    public static function Delete(int $id): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "DELETE FROM `posts` WHERE `id` = :id;";

            $stms = $db->prepare($sql);
            $stms->bindParam('id', $id);

            $stms->execute();
        }
    }

    public static function Update(array $data): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `posts` SET `title` = :title, `content` = :content, `image` = :image WHERE `id` = :id;";

            $stms = $db->prepare($sql);

            $stms->bindParam('title', $data['title']);
            $stms->bindParam('content', $data['content']);
            $stms->bindParam('image', $data['image']);
            $stms->bindParam('id', $data['id']);
            $stms->execute();
        }
    }

    public static function Confirm(int $id): void
    {
        try {
            $db = BaseModal::getDbConnection();

            $sql = "UPDATE `posts` SET `state` = 1 WHERE `id` = :id;";

            $stms = $db->prepare($sql);

            $stms->bindParam('id', $id);
            $stms->execute();
        }
    }

    public static function Create(array $data): bool
    {
        if (isset($_SESSION['admin_id'])) {
            $slug = makeRandomSlug();
            $date = date("y-m-d");

            $db = BaseModal::getDbConnection();

            $sql = "INSERT INTO `posts`(`id`, `title`, `content`, `image`, `admin_id`, `date`, `viewcount`, `state`, `slug`)
                VALUES (null, :title, :content, :image, :admin_id, :date, 0, 0, :slug);";

            $stms = $db->prepare($sql);

            $stms->bindParam('title', $data['title']);
            $stms->bindParam('content', $data['content']);
            $stms->bindParam('image', $data['image']);
            $stms->bindParam('admin_id', $_SESSION['admin_id']);
            $stms->bindParam('date', $date);
            $stms->bindParam('slug', $slug);
            $stms->execute();

            $stms = $stms->fetch(PDO::FETCH_ASSOC);
            return true;
        } else
            return false;

    }

    public static function GetById(int $id): array
    {
        $db = BaseModal::getDbConnection();

        $sql = 'SELECT * FROM `posts` WHERE `id` = :id;';

        $stms = $db->prepare($sql);
        $stms->bindParam('id', $id);
        $stms->execute();

        return $stms->fetch(PDO::FETCH_ASSOC);
    }

    public static function GetAll(): mixed
    {
        $db = BaseModal::getDbConnection();

        $sql = 'SELECT * FROM `posts`;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Innerjoin(): mixed
    {
        $db = BaseModal::getDbConnection();

        $sql = 'SELECT `users`.`id`,
        `users`.`image` as `userimage`,
        `users`.`username`,
        `posts`.`title`,
        `posts`.`id` as `post_id`,
        `posts`.`date`
        FROM `posts`
        INNER JOIN `users` ON `posts`.`admin_id` = `users`.`id`;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Mostvisit(): mixed
    {
        $db = BaseModal::getDbConnection();

        $sql = 'SELECT * FROM `posts` ORDER BY `viewcount` DESC;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function NotConfirmed(): mixed
    {
        $db = BaseModal::getDbConnection();

        $sql = 'SELECT * FROM `posts` WHERE `state` = 0;';

        $stms = $db->prepare($sql);
        $stms->execute();

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Count(): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT Count(*) as count FROM `posts`;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql1 = "SELECT Count(*) as count FROM `posts` WHERE `state` = 0;";

        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $stmt1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        return ["count_all" => $stmt['count'], "count_no_confirmed" => $stmt1['count']];
    }

    public static function Post_in_month(string $date): array
    {
        $db = BaseModal::getDbConnection();

        $sql = "SELECT *,Count(*) as count FROM `posts` WHERE `admin_id` = :id AND `date` >= :date GROUP BY `date`;";

        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $_SESSION['admin_id']);
        $stmt->bindParam("date", $date);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
