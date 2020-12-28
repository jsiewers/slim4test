<?php

namespace App\Action\User;

use App\Domain\User\Service\Reader; 
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowAllAction {
    private $service;

    public function __construct(Reader $service) {
        $this->service = $service; 
    }    
    
    public function __invoke( 
        ServerRequestInterface $request, 
        ResponseInterface $response
        ) : ResponseInterface { 
            // Invoke the Domain with inputs and retain the result
            $result = $this->service->fetchAll();
            // Build the HTTP response
            $response->getBody()->write((string)json_encode($result));
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(201);
        } 
    }

