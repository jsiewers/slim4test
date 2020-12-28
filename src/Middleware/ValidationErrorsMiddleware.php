<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request; 
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
// use Psr\Http\Message\ResponseFactoryInterface; 
use Psr\Http\Message\ResponseInterface;
// use Psr\Http\Server\MiddlewareInterface;

class ValidationErrorsMiddleware {
     
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        
    
        $response = new Response();
     
        $response->getBody()->write(json_enode($result)); $response->withHeader('Content-Type', 'application/json');
        return $response->withStatus(422);
        return $response;
    }
    
}