<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Entity\Comment;
use App\Model\Entity\Interfaces\EntityObjectInterface;
use App\Model\Repository\Interfaces\EntityRepositoryInterface;

final class CommentRepository implements EntityRepositoryInterface
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
        return null;
    }

    public function create(object $comment): bool
    {
        if ($comment){
           $statement = $this->database->getConnection()->prepare('INSERT INTO comment(text_comment, date_comment VALUES (:text_comment, DATE(NOW()) )'); 

           $data = [':text_comment' => $comment['text_comment']
                    
        ];
            $statement->execute($comment);
       
            return new Comment((int)$data['id'], (string) $data['pseudo'],(string) $data['text_comment'], $data['date_creation'], $data ['article_id'], $data['user_profil_id']);
      

        }else{

             return false ; 
        }
        
    }

    public function update(object $comment): bool
    {
        return false;
    }

    public function delete(object $comment): bool
    {
        
        if ($comment){
        $statement = $this->database->getConnection()->prepare('DELATE FROM comment WHERE comment_id = :id'); 

        $data = [':text_comment' => $comment['text_comment']
                 
     ];
         $statement->execute($comment);
    
         return new Comment((int)$data['id'], (string) $data['pseudo'],(string) $data['text_comment'], $data['date_creation'], $data ['article_id'], $data['user_profil_id']);
   

     }else{

          return false ; 
     }
     
}
}