<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\UserRepository;
use App\Service\Http\Request;
use App\Service\AccessControl;
use App\Service\Tokencsrf;


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

    public function displayAllUsers(AccessControl $accessControl): Response
    {

        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }

        $users = $this->userRepository->findAll();

        return new Response($this->view->render([
            'template' => 'backuser',
            'data' => ['users' => $users],
        ], 'backoffice'));
    }


    public function displayEditUser(Request $request, AccessControl $accessControl, Tokencsrf $token): Response
    {
        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }

        $user = $this->userRepository->find((int)$request->query()->get('id'));

        if($request->getMethod() === 'POST'){

           if(!$token->isValid()){

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);

            }

            $data = $request->request()->all();

            if($user->getRole() !== 'ADMIN' && $user->getRole() !== 'MEMBER'){

                return false;
            }

                $user->setRole($data['role']);
            
                $user = $this->userRepository->update($user);
    
                $this->session->addFlashes('success', ['Le role a été changée']);
                
                return new Response('', 303, ['redirect' => 'backuser', 'data' => ['user' => $user]]);
           
        }

        return new Response($this->view->render([
            'template' => 'backedituser',
            'data' => ['user' => $user, 'token'=> $token->generate()],
        ], 'backoffice'));
    }
    

    public function deleteUser($id, AccessControl $accessControl)
    {

        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }
        $user = $this->userRepository->delete($id);

        $this->session->addFlashes('success', ['Votre utilisateur a été supprimée']);

        return new Response('', 303, ['redirect' => 'backuser', 'data' => ['user' => $user]]);

    }
}
