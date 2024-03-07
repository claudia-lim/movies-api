<?php

namespace App\Controllers;


use App\Models\MovieModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DisplayMovieController
{
    private MovieModel $movieModel;

    public function __construct(MovieModel $movieModel) {
        $this->movieModel = $movieModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $data = json_encode($this->movieModel->displayMovieById($args['id']));
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json');
    }

}