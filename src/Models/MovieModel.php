<?php

namespace App\Models;

class MovieModel
{
    private \PDO $db;
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function displayAllMovies(): array {
        $query = $this->db->prepare("
            SELECT `movies`.`title`, `movies`.`year`, `directors`.`name` AS `director`
            FROM `movies`
            INNER JOIN `directors`
            ON `movies`.`director` = `directors`.`id`;");
        $query->execute();
        return $query->fetchAll();
    }

    public function displayMovieById(int $id) : array {
        $query = $this->db->prepare("SELECT `movies`.`title`, `movies`.`year`, `directors`.`name` AS `director`
            FROM `movies` 
            INNER JOIN `directors`
            ON `movies`.`director` = `directors`.`id`
            WHERE `movies`.`id`=?");
        $query->execute([$id]);
        return $query->fetch();
    }

    }
}