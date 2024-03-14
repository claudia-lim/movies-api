<?php

namespace App\Controllers;

use App\Abstract\Controller;
use App\Models\LoggedMovieModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DisplayAllLoggedMoviesController extends Controller
{
    private LoggedMovieModel $loggedMovieModel;

    public function __construct(LoggedMovieModel $loggedMovieModel)
    {
        $this->loggedMovieModel = $loggedMovieModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $data = $this->loggedMovieModel->getAllLoggedMovies();
        return $this->respondWithJson($response,$data);
    }

}