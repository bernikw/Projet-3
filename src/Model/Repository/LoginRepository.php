<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Service\Database;
use App\Model\Repository\Interfaces\EntityRepositoryInterface;

final class LoginRepository 
{
    private Database $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }



}