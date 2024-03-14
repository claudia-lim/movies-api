<?php

namespace App\Models;

class UserModel
{
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getUserInfoById(int $id) {
        $query = $this->db->prepare("SELECT `username`, `password`, `email` FROM `users` WHERE `id` = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public function getUserIdByUsernameOrEmail(string $username, string $email) {
        $query = $this->db->prepare("SELECT `id` FROM `users` WHERE `username` = :username OR `email` = :email");
        $query->bindParam(":username", $username);
        $query->bindParam(":email", $username);
        $query->execute();
        return $query->fetch();
    }

}