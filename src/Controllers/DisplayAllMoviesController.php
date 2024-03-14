<?php

namespace App\Controllers;

use App\Abstract\Controller;
use App\Models\MovieModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class DisplayAllMoviesController extends Controller
{
   private MovieModel $movieModel;
   public function __construct(MovieModel $movieModel, PhpRenderer $renderer) {
       $this->movieModel = $movieModel;
//       $this->renderer = $renderer;
   }

   public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
       $data = $this->movieModel->displayAllMovies();
       return $this->respondWithJson($response, $data);
   }

}