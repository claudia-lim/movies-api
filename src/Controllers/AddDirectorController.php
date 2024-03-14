<?php

namespace App\Controllers;

use App\Abstract\Controller;
use App\Models\DirectorModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddDirectorController extends Controller
{
    private DirectorModel $directorModel;

    public function __construct(DirectorModel $directorModel) {
        $this->directorModel = $directorModel;
}

public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $input = $request->getParsedBody();
        $data = ["success" => true, "msg" => "successfully added new director", "directorId" => $this->directorModel->addDirector($input['name'])];
        return $this->respondWithJson($response, $data);
}
}