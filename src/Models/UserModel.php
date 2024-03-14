<?php

namespace App\Models;

class UserModel
{
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getUsernameById(int $id) {
        $query = $this->db->prepare("SELECT `username` FROM `users` WHERE `id` = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public function getUserIdByUsernameOrEmail(string $username, string $email) {
        $query = $this->db->prepare("SELECT `id` FROM `users` WHERE `username` = :username OR `email` = :email");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetch();
    }

}