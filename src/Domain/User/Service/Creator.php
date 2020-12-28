<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\Repository;
use App\Exception\ValidationException;
use Respect\Validation\Validator as v;
//use Respect\Validation\Exceptions\ValidatorException;
use Respect\Validation\Exceptions\NestedValidationException;
/**
 * Service.
 */ 

final class Creator {
    /**
    * @var Repository 
    */
    private $repository;
    private $validator; //Validator
    
    /**
    * The constructor.
    *
    * @param Repository $repository The repository 
    */
    public function __construct(Repository $repository, v $validator) {
        $this->repository = $repository; 
        $this->validator = $validator;
    }
    /**
    * Create a new user.
    * 
    * @param array $data The form data *
    * @return int The new user ID
    */
    public function create(array $data): array {
        // Input validation
        

        return $this->validate($data); 
        
        // Insert user
        //$userId = $this->repository->create($data); 
        
        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));
        //return $userId; 
    }
    /**
    * Input validation.
    *
    * @param array $data The form data 
    *
    * @throws ValidationException
    *
    * @return void
    */
    private function validate(array $data): array {
            $errors = [];

            $rules = [
                'username' => v::alpha()->length(6.15),
                'first_name' => v::notEmpty(),
                'last_name' => v::notEmpty(),
                'email' => v::notEmpty()
            ];

            foreach($data as $name => $value) {
                try {
                    $rules[$name]->assert($value);
                } catch(NestedValidationException $e) {
                    $errors[] = $e->getMessages();
                }
            }

            return $errors;


              
           
    }

}