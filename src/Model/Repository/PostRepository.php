<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\Post;
use App\Service\Database;


final class PostRepository
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
        $statement = $this->database->getConnection()->prepare('SELECT article.*,user.username 
        FROM article INNER JOIN user ON user.id = article.user_id WHERE article.id = :id');

        $statement->execute($criteria);
        $data = $statement->fetch();


        return $data === false ? null : new Post((int)$data['id'], $data['title'], $data['date_creation'], (string)$data['date_update'], $data['username'], $data['chapo'], $data['text']);
    }

    /*public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }*/

    public function findAll(): ?array
    {

        $statement = $this->database->getConnection()->prepare('SELECT * FROM article');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }


        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post((int)$post['id'], $post['title'], $post['date_creation'], (string)$post['date_update'], $post['user_id'], $post['chapo'], $post['text']);
        }

        return $posts;
    }

    public function create(object $post): bool
    {
        $statement = $this->database->getConnection()->prepare('INSERT INTO article (title, chapo,  date_creation, text) VALUE (:titre, :chapo, DATE(NOW()), :text,');

        $statement->execute([
            ':title' => $post->getTitle(),
            ':chapo' => $post->getChapo(),
            ':date_creation' => $post->getDateCreation(),
            ':text' => $post->getText()

        ]);

        return true;
    }

    public function update(object $post): bool
    {
        $statement = $this->database->getConnection()->prepare('UPDATE article SET (title, chapo,  date_creation, date_update, text) VALUES (:tite, :chapo, DATE (NOW()), DATE(NOW()), :text,');

        $statement->execute([
            ':title' => $post->getTitle(),
            ':chapo' => $post->getChapo(),
            ':date_creation' => $post->getDateCreation(),
            ':date_update' => $post->getDateUpdate(),
            ':text' => $post->getText()
        ]);


        return true;
    }

    public function delete(object $post): bool
    {

        $statement = $this->database->getConnection()->prepare('DELETE FROM article WHERE id = :id');

        $statement->execute([
            ':id' => $post->getId()
        ]);

        return true;
    }
}
