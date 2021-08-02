<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\Post;
use App\Service\Database;
use App\Model\Repository\Interfaces\EntityRepositoryInterface;

final class PostRepository implements EntityRepositoryInterface
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function find(int $id): ?Post
    {
        return null;
    }

    public function findOneBy(array $criteria, array $orderBy = null, ): ?Post
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM article WHERE id = id');

        $statement->execute();
        $data = $statement->setFetchMode();
        
       //$data = $this->database->execute($criteria);
        // réfléchir à l'hydratation des entités;
        return $data === null ? $data : new Post((int)$data['id'], $data['title'], $data['text']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }

    public function findAll(): ?array
    {
        // SB ici faire l'hydratation des objets
        $statement = $this->database->getConnection()->prepare('SELECT * FROM article ORDER BY id DESC LIMIT 6');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }

        // réfléchir à l'hydratation des entités;
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post((int)$post['id'], $post['title'], $post['text']);
        }

        return $posts;
    }

    public function create(object $post): bool
    {
        return false;
    }

    public function update(object $post): bool
    {
        return false;
    }

    public function delete(object $post): bool
    {
        return false;
    }
}
