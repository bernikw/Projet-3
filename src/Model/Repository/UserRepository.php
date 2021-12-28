<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Entity\User;


final class UserRepository
{
    private Database $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    public function findOneByEmail(string $email): ?User
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE email = :email');

        $statement->execute(['email' => $email]);
        $data = $statement->fetch();
        

        // réfléchir à l'hydratation des entités;
        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password']);
    }
    
    public function findCountEmail(string $email): int
    {
        $statement = $this->database->getConnection()->prepare('SELECT count(*) as nb FROM user where email = :email');

        $statement->execute(['email' => $email]);
        $data = $statement->fetch();


        return (int)$data['nb'];
    }

    public function findCountUsername(string $username): int
    {
        $statement = $this->database->getConnection()->prepare('SELECT count(*) as nb FROM user where username = :username');

        $statement->execute(['username' => $username]);
        $data = $statement->fetch();


        return (int)$data['nb'];
    }

    public function find(int $id): ?User
    {
        return null;
    }

    public function findOneBy(array $criteria, array $orderBy = null): ?User
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user');

        $statement->execute();
        $data = $statement->fetch();
        

        // réfléchir à l'hydratation des entités;
        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password'], $data['role']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }

    public function findAll(): ?array
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM user');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }


        $users = [];
        foreach ($data as $user) {
            $users[] = new User((int) $user['id'], $user['username'], $user['email'], $user['password'], $user['role']);
        }

        return $users;
    }

    public function create(object $user): bool

    {
        $statement = $this->database->getConnection()->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)');

        $statement->execute([
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ]);

        

       return true;
    }

    public function update(object $user): bool
    {
        $statement = $this->database->getConnection()->prepare('UPDATE user SET (username, password) VALUES (:username, :password )');

        $statement->execute([
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword()
        ]);

        return true;
    }

    public function delete(object $user): bool
    {
        $statement = $this->database->getConnection()->prepare('DELETE FROM user WHERE id = :id');
        $statement->execute(['id'=> $user->getId()]);
        
        return true; 
    }
}
