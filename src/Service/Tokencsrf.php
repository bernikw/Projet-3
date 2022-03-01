<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;

final class Tokencsrf
{

    private Session $session; 
    private Request $request;

    public function __construct(Session $session, Request $request)
    {
        $this->session = $session;
        $this->request = $request;

    }

    public function generate(): string
    {
        $token =  bin2hex(random_bytes(32));
        
        //'25';//dynamique

        $this->session->set('token', $token);

        return $token;
    }

    public function isValid(): bool
    {
        $datas = $this->request->request()->all();
        if($this->session->get('token') !== $datas['token'])
        {
            return false;
        }
        return true;
    }
    
}