<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;
use App\Model\Entity\User;
use App\Service\Http\Request;


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
            'template' => 'backuser',
            'data' => ['users' => $users],
        ], 'backoffice'));
    }


    public function displayEditUser(Request $request): Response
    {

        $user = $this->userRepository->find((int)$request->query()->get('id'));

        if($request->getMethod() === 'POST'){

            $request->request()->all();
            
            $user = $this->userRepository->update($user);

            $this->session->addFlashes('success', ['Le role a été changée']);
            
            return new Response('', 303, ['redirect' => 'backuser', 'data' => ['user' => $user]]);
        }

        return new Response($this->view->render([
            'template' => 'backedituser',
            'data' => ['user' => $user],
        ], 'backoffice'));
    }


    public function deleteUser($id)
    {
        $user = $this->userRepository->delete($id);

        $this->session->addFlashes('success', ['Votre utilisateur a été supprimée']);

        return new Response('', 303, ['redirect' => 'backuser', 'data' => ['user' => $user]]);

    }
}
