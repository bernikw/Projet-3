<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\Http\Response;
use App\Service\Http\Session\Session;

final class AccessControl

{

    private Session $session;


    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function isConnect(): bool
    {
        if ($this->session->get('user')) {

            return true;
        }  
         
        return false;   
    }
    public function isAdmin(): bool
    {
        $user = $this->session->get('user');

        if(!$user){

            return false;
        }

        if($user->getRole() !== 'ADMIN'){

            return false;
        }

        return true; 

    }
}
