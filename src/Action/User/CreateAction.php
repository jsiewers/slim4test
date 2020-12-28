<?php
namespace App\Action\User;
use App\Domain\User\Service\Creator; 
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CreateAction {

    private $service;

    public function __construct(Creator $service) {
        $this->service = $service; 
    }
    
    public function __invoke( 
        ServerRequestInterface $request, 
        ResponseInterface $response
        ): ResponseInterface {
        // Collect input from the HTTP request 
        $data = (array)$request->getParsedBody();
        // Invoke the Domain with inputs and retain the result
        $userId = $this->service->create($data);
        // Transform the result into the JSON representation
        $result = [
        'user_id' => $userId
        ];
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
    } 
}