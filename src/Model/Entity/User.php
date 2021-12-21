<?php

declare(strict_types=1);

namespace App\Model\Entity;



final class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
   

    public function __construct(int $id, string $username, string $email, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /*public function getRole(): array
    {
        return $this->role;
        
    }

    public function setRole(array $role): self
    {
        $this->role = $role;
        return $this;
   }*/
}
