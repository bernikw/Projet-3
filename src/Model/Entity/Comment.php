<?php

declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Entity\Interfaces\EntityObjectInterface;

final class Comment
{
    private int $id;
    private string $pseudo; 
    private string $text;
    private string $dateComment; 
    private int $valid;
    private int $idPost;
    

    public function __construct(int $id, string $pseudo, string $text,string $dateComment, int $valid, int $idPost)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->text = $text;
        $this->dateComment = $dateComment;
        $this->valid = $valid;
        $this->idPost = $idPost;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
       $this->pseudo = $pseudo;
       return $this;
    }
    
    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getDateComment(): string
    {
        return $this->dateComment;
    }

    public function setDateComment(string $dateComment): self
    {
       $this->dateComment = $dateComment;
       return $this;
    }

    public function getValid(): int
    {
        return $this->valid;
    }

    public function setValid(int $valid): self
    {
       $this->valid = $valid;
       return $this;
    }

    public function getIdPost(): int
    {
        return $this->idPost;
    }

    public function setIdPost(string $idPost): self
    {
       $this->idPost = $idPost;
       return $this;
    }

}
