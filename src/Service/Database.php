<?php

declare(strict_types=1);

namespace App\Service;

use PDO;
use PDOException;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
  
    public function __construct($db_host = 'localhost', $db_name = 'myblog', $db_user = 'root', $db_pass = 'root', )
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        
       
    }

    private function getConnection(){
        try{

            $pdo = new PDO('mysql:dbname;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->pdo;
        }

        catch(PDOException $e){

            die('Error:' . $e->getMessage());
        }

        $response = $pdo->query('SELECT * FROM myblog');



    }
  

}
