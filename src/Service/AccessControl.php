<?php

declare(strict_types=1);

namespace App\Service;

final class AccessControl
{
    
    function __construct()
    {
       
    }

    public function isAdmin(): bool
    {


       return true;
    }
}
