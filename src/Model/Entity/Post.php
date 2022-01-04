<?php

declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Entity\Interfaces\EntityObjectInterface;

final class Post
{
    private int $id;
    private string $title;
    private ?string $dateCreation;
    private ?string $dateUpdate;
    private string $pseudo;
    private string $chapo;
    private string $text;
    

    public function __construct(int $id, string $title, ?string $dateCreation, ?string $dateUpdate, string $pseudo, string $chapo, string $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->dateCreation = $dateCreation;
        $this->dateUpdate = $dateUpdate;
        $this->pseudo = $pseudo;
        $this->chapo = $chapo;
        $this->text = $text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }

    public function setDateCreation(string $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getDateUpdate(): string
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(string $dateUpdate = null): self
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
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

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;
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
}
