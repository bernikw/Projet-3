<?php

declare(strict_types=1);

namespace App\Service;

use PDO;
use PDOException;
use Psr\Log\NullLogger;

class Database
{

    private string $dbName;
    private string $dbUser;
    private string $dbPass;
    private string $dbHost;
    private \PDO $pdo;
  
    public function __construct($dbHost = 'localhost', $dbName = 'myblog', $dbUser = 'root', $dbPass = '', )
    {
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        
       
    }

    public function getConnection(): \PDO
    {
    
           $this->pdo = new \PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ';charset=utf8', $this->dbUser, $this->dbPass);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    
            return $this->pdo;
         


    }
  

}
