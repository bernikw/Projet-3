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

            $infoUser = $loginValidator->isValid($request->request()->all());

            if (!$infoUser) {
              return false;
           }

            $user = $this->userRepository->findOneBy(['email' => $infoUser['email']]);

            if (!isset($user) || !password_verify($infoUser['password'], $user->getPassword())) {
                
               return false;

            }    
        
                $this->session->set('user', $user);

                return new Response('', 303, ['redirect' => 'posts'], 404);
            
        }
        
        return new Response($this->view->render(['template' => 'login', 'data' => []]));
    }

    private function isLogged(): bool
    {
        if ($this->session->set('username', $username))
        {
            return true; 
        }
    }


   private function isAdmin(): bool
   {

            return true;
       
    }

    public function logoutAction(): Response
    {
        $this->session->remove('user');
        return new Response('', 303, ['redirect' => 'home']);
    }
}
