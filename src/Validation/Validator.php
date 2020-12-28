<?php

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Validator {

    public function validate(array $data, array $rules) {
        //$data = $request->getParsedBody();
        var_dump($data); 
    }




}