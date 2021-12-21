<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Entity\Comment;


final class CommentRepository 
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function find(int $id): ?Comment
    {
        return null;
    }

    public function findOneBy(array $criteria, array $orderBy = null): ?Comment
    {
        return null;
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): ?array
    {
        $statement = $this->database->getConnection()->prepare('SELECT comment.*,user.username
        FROM comment 
        INNER JOIN user ON user.id = comment.user_profile_id WHERE article_id = :article_id AND valid = 1');

        $statement->execute($criteria);
        $data = $statement->fetchAll();
       

        if ($data === false) {
            return null;
        }

    
        $comments = [];
        foreach ($data as $comment) {
            $comments[] = new Comment((int)$comment['id'], (string) $comment['username'], (string) $comment['text_comment'], (string) $comment['date_comment'],(int)$comment['article_id']);
        }

        return $comments;
    }

    public function findAll(): ?array
    {
        $statement = $this->database->getConnection()->prepare('SELECT * FROM comment');

        $statement->execute();
        $data = $statement->fetchAll();

        if ($data === null) {
            return null;
        }

        $comments = [];
        foreach ($data as $comment) {
            $comments[] = new Comment((int)$comment['id'], $comment['text_comment'], $comment['date_comment'], $comment['valid'], $comment['article_id'], $comment['user_profile_id']);
        }

        return $comments;
    }

    public function create(object $comment): bool
    {
        
           $statement = $this->database->getConnection()->prepare('INSERT INTO comment(text_comment, date_comment VALUES (:text, DATE(NOW()))'); 

                    
            $statement->execute([
                ':pseudo' => $comment->getPseudo(),
                ':text' => $comment->getText(),
                ':dateComment' => $comment->getDateComment(),
                ':idPost' => $comment->getIdPost()
            ]);
       
            return true;
     
        
    }

    public function update(object $comment): bool
    {
        return false;
    }

    public function delete(object $comment): bool
    {
        
        $statement = $this->database->getConnection()->prepare('DELETE FROM comment WHERE comment_id = :id'); 

        $statement->execute([':text_comment' => $comment->getTextComment()]);
      
         return true;   
     
}
}