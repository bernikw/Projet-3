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

    public function __construct(UserRepository $userRepository, View $view, Session $session)
    {
        $this->userRepository = $userRepository;
        $this->view = $view;
        $this->session = $session;
    }


    public function loginAction(Request $request, LoginValidator $loginValidator): Response
    {

        if ($request->getMethod() === 'POST') {

            $infoUser = $request->request()->all();
            $loginValidator->isValid($infoUser);


            if (!$infoUser) {
                return false;
            }

            $user = $this->userRepository->findOneByEmail($infoUser['email']);

            if ($user !== null && password_verify($infoUser['password'], $user->getPassword())) {


                $this->session->set('user', $user);

                if ($this->session->get('user')->getRole() == 'MEMBER') {

                    return new Response('', 303, ['redirect' => 'home']);

                } elseif ($this->session->get('user')->getRole() == 'ADMIN') {
                    
                    return new Response('', 303, ['redirect' => 'article']);
                }
            } else {

                $this->session->addFlashes('danger', $loginValidator->getErrors());
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
