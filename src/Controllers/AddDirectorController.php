<?php

namespace App\Controllers;

use App\Models\DirectorModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddDirectorController
{
    private DirectorModel $directorModel;

    public function __construct(DirectorModel $directorModel) {
        $this->directorModel = $directorModel;
}

public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $input = $request->getParsedBody();
        $this->directorModel->addDirector($input['name']);
        $response->getBody()->write("successfully added new director");
        return $response;
}
}