<?php
namespace App\Action\User;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HomeAction {
    public function __invoke( 
        Request $request, 
        Response $response
        ) : Response { 
            $result = ['error' => ['message' => 'Validation failed']];
            $response->getBody()->write(json_encode($result));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(422);       }
}