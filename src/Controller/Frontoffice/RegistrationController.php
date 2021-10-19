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

        if ($request->getMethod() === 'POST') {

            $datas = $registerValidator->isValidDatas($request->request()->all());
            if ($datas) {

                // faire la validation des datas
                $user = new User($datas['username'], $datas['email'], $datas['password'], $datas['role']);

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

                $this->session->addFlashes('success', 'Votre compte a été crée');
                return new Response('', 303, ['redirect' => 'home']);

            } else {

                $this->session->addFlashes(' ', 'Votre compte n\'a pas été crée');
                return new Response('', 303, ['redirect' => 'registration']);
            }

        }

       
        return new Response($this->view->render([
            'template' => 'registration',
            'data' => [],
        ]));
    }
}
