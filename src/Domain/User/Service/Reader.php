<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\Repository;

/**
 * Service.
 */
final class Reader {
    /**
    * @var Repository 
    */
    private $repository;
    
    /**
    * The constructor.
    *
    * @param Repository $repository 
    */
    public function __construct(Repository $repository) {
        $this->repository = $repository; 
    }
    /**
    * Get a list of anything.
    * 
    * 
    * @return array of anything
    */
    public function fetchAll(): array {
         return $this->repository->fetchAll();
    }

    public function fetch(Number $id) {
        return $this->repository->fetch($id);
    }

    

}