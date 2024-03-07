<?php

namespace App\Controllers;

use App\Models\MovieModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class DisplayAllMoviesController
{
   private MovieModel $movieModel;
   public function __construct(MovieModel $movieModel, PhpRenderer $renderer) {
       $this->movieModel = $movieModel;
//       $this->renderer = $renderer;
   }

   public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
       $data = json_encode($this->movieModel->displayAllMovies());
       $response->getBody()->write($data);
       return $response->withHeader('Content-Type', 'application/json');
   }

}