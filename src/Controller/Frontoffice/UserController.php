<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\View\View;
use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;
use App\Service\Validator\LoginValidator;
use App\Service\AccessControl;
use App\Service\Tokencsrf;



final class UserController
{
    private UserRepository $userRepository;
    private View $view;
    private Session $session;
    private Tokencsrf $token;

    public function __construct(UserRepository $userRepository, View $view, Session $session, Tokencsrf $token)
    {
        $this->userRepository = $userRepository;
        $this->view = $view;
        $this->session = $session;
        $this->token = $token;
    }


    public function loginAction(Request $request, LoginValidator $loginValidator, AccessControl $accessControl): Response
    {
        if($accessControl->isConnect()){

            return new Response('', 303, ['redirect' => 'home']);
        }

        if ($request->getMethod() === 'POST') {


         if(!$this->token->isValid()){

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);

            }

            $infoUser = $request->request()->all();
            $loginValidator->isValid($infoUser);


            if (!$infoUser) {
                return false;
            }

            $user = $this->userRepository->findOneByEmail($infoUser['email']);

            if ($user !== null && password_verify($infoUser['password'], $user->getPassword())) {


                $this->session->set('user', $user);

                return new Response('', 303, ['redirect' => 'home']);
              
            } 

                $this->session->addFlashes('danger', $loginValidator->getErrors());
           
        }
        
        return new Response($this->view->render(['template' => 'login', 'data' => ['token'=> $this->token->generate()]]));
        
    }


    public function logoutAction(): Response
    {
        $this->session->remove('user');
        return new Response('', 303, ['redirect' => 'home']);
    }
}
