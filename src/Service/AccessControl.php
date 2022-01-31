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

    public function isAdmin(): bool
    {
        if ($this->session->get('user')) {

            return true;

        } else {

            $this->session->addFlashes('danger', ['Vous n\'avez pas acces à cette page']);

        }

        return false;
    }
}
