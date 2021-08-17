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
    private int $idPost;

    public function __construct(int $id, string $pseudo, string $text,string $dateComment, int $idPost)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->text = $text;
        $this->dateComment = $dateComment;
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

    public function setDateComment(string $dateCommment): self
    {
       $this->dateComment = $dateComment;
       return $this;
    }

    public function getIdPost(): int
    {
        return $this->idPost;
    }
}
