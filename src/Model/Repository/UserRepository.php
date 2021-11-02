<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Entity\User;
use App\Model\Repository\Interfaces\EntityRepositoryInterface;

final class UserRepository implements EntityRepositoryInterface
{
    private Database $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function find(int $id): ?User
    {
        return null;
    }

    public function findOneBy(array $criteria, array $orderBy = null): ?User
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM user WHERE email= :email');

        $statement->execute($criteria);
        $data = $statement->fetch();
        $row = $statement->rowCount();

        // réfléchir à l'hydratation des entités;
        return $data === false ? null : new User((int)$data['id'], $data['username'], $data['email'], $data['password'], $data['role']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }

    public function findAll(): ?array
    {
        return null;
    }

    public function create(object $user): bool

    {
       /* $statement = $this->database->getConnection()->prepare('INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role');


        $statement->execute([
            ':id' => $user->getId(),
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole()
        ]);*/
        return false;
    }

    public function update(object $user): bool
    {
        return false;
    }

    public function delete(object $user): bool
    {
        return false;
    }
}
