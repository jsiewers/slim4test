<?php

use Slim\App;
use Selective\BasePath\BasePathMiddleware;
use Slim\Middleware\ErrorMiddleware;
use App\Middleware\ValidationErrorsMiddleware;


return function (App $app) {
    // Parse json, form data and xml 
    $app->addBodyParsingMiddleware();
    
    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

    //Add basepath
    $app->add(BasePathMiddleware::class);
 
    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class); 
    
    //Validation
    $app->add(ValidationErrorsMiddleware::class);


};