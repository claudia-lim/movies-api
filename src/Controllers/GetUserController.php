<?php

namespace App\Controllers;

use App\Abstract\Controller;
use App\Models\UserModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetUserController extends Controller
{
    private UserModel $userModel;

    public function __construct(UserModel $userModel) {
        $this->userModel = $userModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args) {
        $id = $args['id'];
        $userData = $this->userModel->getUserInfoById($id);
        return $this->respondWithJson($response, $userData);
    }

}