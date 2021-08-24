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
        $statement = $this->database->getConnection()->prepare('SELECT article.*,user.username 
        FROM article INNER JOIN user ON user.id = article.user_id WHERE article.id = :id ');

        $statement->execute($criteria);
        $data = $statement->fetch();

     
        return $data === false ? null : new Post((int)$data['id'], $data['title'], $data['date_creation'], (string)$data['date_update'], $data['user_id'], $data['chapo'], $data['text'], $data['username']);
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        return null;
    }

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

        if ($post){
             
        $statement = $this->database->getConnection()->prepare('INSERT INTO article(title, chapo, text = :text, date_creation = NOW(), date_update = NOW() WHERE article.id = :id');

        $data = [':id' => $post['article_id'],
                ':title' => $post['title'],
                ':chapo' => $post ['chapo'],
                ':text' => $post ['text']           
    ];

        $statement->execute($post);
       
        return new Post((int)$data['id'], $data['title'], $data['chapo'], $data['text'], $data['date_creation'], (string)$data['date_update'], $data['user_id']);

        } else {

            return false;
        }
             
    }

    public function update(object $post): bool
    { 
        if ($post){
             
        $statement = $this->database->getConnection()->prepare('UPDATE article SET (title = :title, chapo = :chapo, text, date_creation, date_update, user_id) VALUES (, , :text, NOW(), NOW(),:id');

        $data = [':id' => $post['article_id'],
                ':title' => $post['title'],
                ':chapo' => $post ['chapo'],
                ':text' => $post ['text']           
    ];

        $statement->execute($post);
       
        return new Post((int)$data['id'], $data['title'], $data['chapo'], $data['text'], $data['date_creation'], (string)$data['date_update'], $data['user_id']);

        } else {

            return false;
        }            

    }

    public function delete(object $post): bool
    {  
        if ($post){
             
        $statement = $this->database->getConnection()->prepare('DELATE FROM article WHERE article.id = :id'); 
        
        $data = [':id' => $post['article_id'],
        ];

        $statement->execute($post);

        return new Post((int)$data['id'], $data['title'], $data['chapo'], $data['text'], $data['date_creation'], (string)$data['date_update'], $data['user_id']);
       
        } else {

            return false;
        }
             
    }
}


