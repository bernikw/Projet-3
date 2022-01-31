<?php

declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Entity\Interfaces\EntityObjectInterface;

final class Comment
{
    private int $id;
    private string $username; 
    private string $textComment;
    private ?string $dateComment; 
    private int $valid;
    private int $idPost;
    private string $userProfileId;
    

    public function __construct(int $id, string $username, string $textComment, ?string $dateComment, int $valid, int $idPost, string $userProfileId)
    {
        $this->id = $id;
        $this->userId = $username;
        $this->text = $textComment;
        $this->dateComment = $dateComment;
        $this->valid = $valid;
        $this->idPost = $idPost;
        $this->userProfileId = $userProfileId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
       $this->username = $username;
       return $this;
    }
    
    public function getTextComment(): string
    {
        return $this->textComment;
    }

    public function setTextComment(string $textComment): self
    {
        $this->textComment = $textComment;
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

    public function getUserProfileId(): string
    {
        return $this->userProfileId;
    }

    public function setUserProfileId(string $userProfileId): self
    {
       $this->userProfileId = $userProfileId;
       return $this;
    }

}
