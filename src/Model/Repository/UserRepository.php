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
        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password'], $data['role']);
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
        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE user.id = :id');

        $statement->execute(['id' => $id]);
        $data = $statement->fetch();
        

        // réfléchir à l'hydratation des entités;
        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password'], $data['role']);
    }

    public function findOneBy(array $criteria): ?User
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE user.id = :id');

        $statement->execute($criteria);
        $data = $statement->fetch();
        

        // réfléchir à l'hydratation des entités;
        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password'], $data['role']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE role = :role AND role = ADMIN');

        $statement->execute($criteria);
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }


        $users = [];
        foreach ($data as $user) {
            $users[] = new User((int) $user['id'], $user['username'], $user['email'], $user['password'], (string)$user['role']);
        }

        return $users;


    }

    public function findByAdmin(string $role): ?User
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE role = :role AND role = ADMIN');

        $statement->execute(['role' => $role]);
        $data = $statement->fetch();

        return $data === false ? null : new User((int) $data['id'], $data['username'], $data['email'], $data['password'], $data['role']);

    }

    public function findAll(): ?array
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE user.id = id');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }


        $users = [];
        foreach ($data as $user) {
            $users[] = new User((int) $user['id'], $user['username'], $user['email'], $user['password'], (string)$user['role']);
        }

        return $users;
    }


    public function create(object $user): bool

    {
        $statement = $this->database->getConnection()->prepare('INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role)');

        $statement->execute([
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole() 

        ]);        

       return true;
    }

    public function updateAuthor(object $user): bool
    {

        $statement = $this->database->getConnection()->prepare('UPDATE user SET username = :username WHERE user.id = :id');

        $statement->execute([
            ':id' => $user->getId(),  
            ':username' => $user->getUsername()
        ]);

        return true;

    }

    public function update(object $user): bool
    {
        $statement = $this->database->getConnection()->prepare('UPDATE user SET role = :role WHERE user.id = :id');

        $statement->execute([
            ':id' => $user->getId(),  
            ':role' => $user->getRole()
        ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $statement = $this->database->getConnection()->prepare('DELETE FROM user WHERE id = :id');
        $statement->execute(['id'=> $id]);
        
        return true; 
    }
}
