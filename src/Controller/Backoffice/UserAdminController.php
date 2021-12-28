<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;


final class UserAdminController
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

    public function displayAllUsers(): Response
    {

        $users = $this->userRepository->findAll();

        return new Response($this->view->render([
            'template' => 'user',
            'data' => ['users' => $users],
        ], 'backoffice'));
    }


    public function changeRole()
    {

        $users = $this->postRepository->update();

        $this->session->addFlashes('success', ['Le role a été changée']);

        return new Response($this->view->render([
            'template' => 'user',
            'data' => ['user' => $users],
        ], 'backoffice'));
    }
}
