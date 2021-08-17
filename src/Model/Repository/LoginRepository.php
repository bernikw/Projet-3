<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Entity\User;
use App\Model\Repository\Interfaces\EntityRepositoryInterface;
use App\Service\FormValidator\FormValidator;

final class LoginRepository 
{
    private Database $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getLogin(array $criteria)
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE username = :username');

        $statement->execute($criteria);
        $data = $statement->fetch();

        return $data = 

    }

    public function getRole(array $criteria){

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE username = :username');

        $statement->execute($criteria);
        $data = $statement->fetch();

        return $data === false ? null : new User ((int)$data ['id'], $data ['pseudo'], $data ['password']);

    }

    public function checkPassword($password, $passwordConfirm){

        if ($password !=$passwordConfirm){
            return false;
        }else {
            return true; 
        }

    }


}