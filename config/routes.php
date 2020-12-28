<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface; 
use Slim\App;


return function (App $app) { 
    $app->get('/', \App\Action\User\HomeAction::class);
    $app->post('/users', \App\Action\User\CreateAction::class);
    $app->get('/users', \App\Action\User\ShowAllAction::class);
    $app->get('/user/{id}', \App\Action\ShowAction::class);
};