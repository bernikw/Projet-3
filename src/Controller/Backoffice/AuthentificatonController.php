<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;
use App\View\View;
use App\Service\Http\Response;


final class AuthentificationController
{
    private View $view;
    private Session $session;
    private UserRepository $userRepository;


    public function __construct(View $view, UserRepository $userRepository, Session $session)
    {
        $this->view = $view;
        $this->userRepository = $userRepository;
        $this->session = $session;
    }

    public function isAdmin(): Response
    {

        if($this->session->get('user')->getRole() == 'ADMIN')
        {
            return true;

        } else {

            $this->session->addFlashes('danger', ['Vous n\'avez pas acces à cette page']);
            return new Response('', 303, ['redirect' => 'login']);
        }
        
    }

}