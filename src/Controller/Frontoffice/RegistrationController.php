<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Model\Repository\UserRepository;
use App\View\View;
use App\Service\Mailer;
use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Entity\User;
use App\Service\Validator\RegisterValidator;
use App\Service\AccessControl;
use App\Service\Tokencsrf;


final class RegistrationController
{
    private View $view;
    private Session $session;
    private UserRepository $userRepository;
    private Tokencsrf $token;

    public function __construct(View $view, Session $session, UserRepository $userRepository, Tokencsrf $token)
    {
        $this->view = $view;
        $this->session = $session;
        $this->userRepository = $userRepository;
        $this->token = $token;
    }

    public function displayRegistrationAction(Request $request, Mailer $mailer, RegisterValidator $registerValidator, AccessControl $accessControl): Response
    {
        if($accessControl->isConnect()){

            return new Response('', 303, ['redirect' => 'home']);
        }
    
        $datas = [];

        if ($request->getMethod() === 'POST') {


            if(!$this->token->isValid()){

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);

            }

            $datas = $request->request()->all();

            if ($registerValidator->isValid($datas)) {

                $pass = password_hash($datas['password'], PASSWORD_BCRYPT);

                $user = new User(0, $datas['username'], $datas['email'], $pass, 'MEMBER');

                $this->userRepository->create($user);


                $content = $this->view->render([
                    "template" => "emailregistration",
                    "data" => ['user' => $datas]
                ]);

                $message = $mailer->sendMessage(
                    "Création du compte",
                    $content,
                    $datas['email'],
                );

                $this->session->addFlashes('success', ['Votre compte a été crée']);
                return new Response('', 303, ['redirect' => 'login']);
            } else {

                $this->session->addFlashes('danger', $registerValidator->getErrors());
            }
        }


        return new Response($this->view->render([
            'template' => 'registration',
            'data' => ['token'=> $this->token->generate()]
        ]));
    }
}
//'data' => ['datassaisi' => $datas, 'datassaisi' => ['token'=> $this->token->generate()]],