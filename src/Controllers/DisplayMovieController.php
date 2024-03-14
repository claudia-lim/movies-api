<?php

namespace App\Controllers;


use App\Abstract\Controller;
use App\Models\MovieModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DisplayMovieController extends Controller
{
    private MovieModel $movieModel;

    public function __construct(MovieModel $movieModel) {
        $this->movieModel = $movieModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $data = $this->movieModel->displayMovieById($args['id']);
        return $this->respondWithJson($response, $data);
    }

}