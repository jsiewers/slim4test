<?php
namespace App\Action\User;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowAction {
    public function __invoke( 
        ServerRequestInterface $request, 
        ResponseInterface $response
        ) : ResponseInterface { 
            $result = ['error' => ['message' => 'Validation failed']];
            $response->getBody()->write(json_encode($result));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(422);       
            }
}