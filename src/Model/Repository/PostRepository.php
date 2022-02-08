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
        $statement = $this->database->getConnection()->prepare('SELECT article.*,user.username FROM article INNER JOIN user ON user.id = article.user_id WHERE article.id = :id');

        $statement->execute(['id' => $id]);
        $data = $statement->fetch();
        
        return $data === false ? null : new Post((int)$data['id'], $data['title'], $data['chapo'], $data['content'], $data['date_creation'], (string)$data['date_update'], (int)$data['user_id'], $data['username']);
    }

    public function findOneBy(array $criteria, array $orderBy = null): ?Post
    {
        $statement = $this->database->getConnection()->prepare('SELECT article.*,user.username 
        FROM article INNER JOIN user ON user.id = article.user_id WHERE article.id = :id');

        $statement->execute($criteria);
        $data = $statement->fetch();


        return $data === false ? null : new Post((int)$data['id'], $data['title'], $data['chapo'], $data['content'], $data['date_creation'], (string)$data['date_update'], (int)$data['user_id'], $data['username']);
    }

  

    public function findAll(): ?array
    {

        $statement = $this->database->getConnection()->prepare('SELECT article.*,user.username FROM article INNER JOIN user ON user.id = article.user_id ORDER BY date_creation DESC');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }


        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post((int)$post['id'], $post['title'], $post['chapo'], $post['content'], $post['date_creation'], (string)$post['date_update'], (int)$post['user_id'], $post['username']);
        }

        return $posts;
    }

    public function create(object $post): bool
    {
       
        $statement = $this->database->getConnection()->prepare('INSERT INTO article (title, chapo, content, date_creation, date_update, user_id) VALUE (:title, :chapo, :content, NOW(), NOW(), :userId )');

        $statement->bindValue('title', $post->getTitle());
        $statement->bindValue('chapo', $post->getChapo());
        $statement->bindValue('content', $post->getContent());
        $statement->bindValue('userId', $post->getUserId());
      

        $statement->execute();
        
        
        return true;
    }

    public function update(object $post): bool
    {
        $statement = $this->database->getConnection()->prepare('UPDATE article SET title = :title, chapo = :chapo, content = :content,  date_update = NOW()  WHERE id = :id');

        $statement->execute([ 
            ':id' => $post->getId(),
            ':title' => $post->getTitle(),
            ':chapo' => $post->getChapo(),
            ':content' => $post->getContent()
            //':username' => $post->getUsername()
 ]);

        return true;
    }

    public function delete(int $id): bool
    {

        $statement = $this->database->getConnection()->prepare('DELETE FROM article WHERE id = :id');

        $statement->execute([
            ':id' => $id
        ]);

        return true;
    }
}
