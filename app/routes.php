<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Controllers\DisplayAllLoggedMoviesController;
use App\Controllers\DisplayAllMoviesController;
use App\Controllers\DisplayMovieController;
use App\Controllers\AddDirectorController;
use App\Controllers\GetUserController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) use ($app) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

//built in from slim:
//    $app->group('/users', function (Group $group) {
//        $group->get('', ListUsersAction::class);
//        $group->get('/{id}', ViewUserAction::class);
//    });

    $app->get('/movies', DisplayAllMoviesController::class);

    $app->get('/movies/{id}', DisplayMovieController::class);

    $app->post('/directors/add', AddDirectorController::class);

    $app->get('/users/{id}', GetUserController::class);

    $app->get('/loggedmovies', DisplayAllLoggedMoviesController::class);
};
