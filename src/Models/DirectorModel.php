<?php

namespace App\Models;

class DirectorModel
{
    private \PDO $db;
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    public function getDirectorId(string $dirName): int {
        $query = $this->db->prepare("SELECT `id` FROM `directors` WHERE `name`=?");
        $query->execute([$dirName]);
        return $query->fetch();
    }

    public function addDirector (string $director) {
        $query = $this->db->prepare("INSERT INTO `directors` (name)
            VALUES (?)");
        $query->execute([$director]);
        return $this->db->lastInsertId();
    }
}