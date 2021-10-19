<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\View\View;
use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;
use App\Service\Validator\LoginValidator;


final class UserController
{
    private UserRepository $userRepository;
    private View $view;
    private Session $session;

    /*private function isValidLoginForm(?array $infoUser): bool
    {
        if ($infoUser === null) {
            return false;
        }

        $user = $this->userRepository->findOneBy(['email' => $infoUser['email']]);

        if ($user === null || $infoUser['password'] !== $user->getPassword()) {
            return false;
        }

        $this->session->set('user', $user);

        return true;
    }*/

    public function __construct(UserRepository $userRepository, View $view, Session $session)
    {
        $this->userRepository = $userRepository;
        $this->view = $view;
        $this->session = $session;
    }

    public function loginAction(LoginValidator $loginValidator, Request $request): Response
    {

        if ($request->getMethod() === 'POST') {

            if ($infoUser = $loginValidator->isValidLoginForm($request->request()->all())){
                if ($infoUser) {
                    // if ($user role)
                    return new Response('', 303, ['redirect' => 'posts'], 404);
                }else{

                     $this->session->addFlashes('error', 'Mauvais identifiants');
                }
            }
           
        }
        return new Response($this->view->render(['template' => 'login', 'data' => []]));
    }

    public function logoutAction(): Response
    {
        $this->session->remove('user');
        return new Response('', 303, ['redirect' => 'home']);
    }
}
