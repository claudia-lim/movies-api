<?php

namespace App\Models;

class LoggedMovieModel
{
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllLoggedMovies() {
        $query =$this->db->prepare("SELECT `users`.`username`, `loggedmovies`.`date`, `movies`.`title`, `loggedmovies`.`review`
FROM `loggedmovies`
INNER JOIN `users`
ON `loggedmovies`.`userId` = `users`.`id`
INNER JOIN `movies`
ON `loggedmovies`.`movieId` = `movies`.`id`");
        $query->execute();
        return $query->fetchAll();
    }

}