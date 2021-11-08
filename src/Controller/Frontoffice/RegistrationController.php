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


final class RegistrationController
{
    private View $view;
    private Session $session;
    private UserRepository $userRepository;

    public function __construct(View $view, Session $session, UserRepository $userRepository)
    {
        $this->view = $view;
        $this->session = $session;
        $this->userRepository = $userRepository;
    }

    public function displayRegistrationAction(Request $request, Mailer $mailer, RegisterValidator $registerValidator): Response
    {
            $datas = [];
            
        if ($request->getMethod() === 'POST') {

            $datas = $request->request()->all();
            //var_dump($datas);
            //die();
            if ($registerValidator->isValid($datas)) {


                $result = $this->userRepository->findOneBy(['username' => $datas['username']]);

                if ($result >= 1) {
                    return false;
                }

                $result = $this->userRepository->findOneBy(['email' => $datas['email']]);

                if ($result >= 1) {
                    return false;
                }


                $user = new User(0, $datas['username'], $datas['email'], $datas[password_hash($datas['password'], PASSWORD_BCRYPT)], $datas['role']);

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

                $this->session->addFlashes('',$registerValidator->getErrors());
            }
        }


        return new Response($this->view->render([
            'template' => 'registration',
            'data' => ['datassaisi'=>$datas],
        ]));
    }
}
