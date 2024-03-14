<?php

namespace App\Abstract;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Controller
{

    abstract public function __invoke(RequestInterface $request, ResponseInterface $response, array $args);

    protected function respondWithJson(ResponseInterface $response, $data, int $statusCode = 200) {
        $json = json_encode($data);
        if ($json) {
            $response->getBody()->write($json);
            return $response->withHeader('Content-type', 'application/json')->withStatus($statusCode);
        } else {
            throw new \Exception("unable to encode data into JSON");
        }

    }
}