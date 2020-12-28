<?php
namespace App\Domain\User\Repository; 

use PDO;

/**
 * Repository.
 */
class Repository {

    /**
    * @var PDO The database connection 
    */
    protected $connection;
    
    /**
    * Constructor.
    *
    * @param PDO $connection The database connection 
    */
    public function __construct(PDO $connection) {
        $this->connection = $connection; 
    }

    /**
    * Fetch users from database.
    *
    * 
    * @return pdo object
    */
    public function fetchAll() {
        $sql = "SELECT * FROM users";
        $sth = $this->connection->prepare($sql);
        $sth->execute(); 
        return $sth->fetchAll();
    }

    public function fetch(Number $id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $sth = $this->connection->prepare($sql);
        $sth->bindparam(':id', $id);

        $sth->execute(); 
        return $sth->fetch();
    }

    /**
     * Create a new user
     * 
     * $return pdo object
     * 
     */
    public function create() {
        $row = [
            'username' => $user['username'], 
            'first_name' => $user['first_name'], 
            'last_name' => $user['last_name'], 
            'email' => $user['email'],
            ];
        $sql = "INSERT INTO users SET username=:username,
            first_name=:first_name,
            last_name=:last_name,
            email=:email;";
        $this->connection->prepare($sql)->execute($row);
        return (int)$this->connection->lastInsertId();    
    }
}