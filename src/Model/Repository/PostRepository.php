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

    public function findOneBy(array $criteria, array $orderBy = null): ?Post
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM article WHERE id = :id');

        $statement->execute($criteria);
        $data = $statement->fetch();

     
        return $data === false ? null : new Post((int)$data['id'], $data['title'], $data['date_creation'], $data['chapo'], $data['text']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }

    public function findAll(): ?array
    {
       
        $statement = $this->database->getConnection()->prepare('SELECT * FROM article ');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }

       
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post((int)$post['id'], $post['title'], $post['date_creation'], $post['chapo'], $post['text']);
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
