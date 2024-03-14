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

    public function getuserIdByUsername(string $username) {
        $query = $this->db->prepare("SELECT `id` FROM `users` WHERE `username` = ?");
        $query->execute([$username]);
        return $query->fetch();
    }


}