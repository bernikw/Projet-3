<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Service\Http\Request;
use App\View\View;
use App\Service\Http\Response;
use App\Service\Validator\ContactValidator;
use App\Service\Http\Session\Session;
use App\Service\Mailer;
use App\Service\Tokencsrf;


final class HomeController
{
    private View $view;
    private Session $session;
    private Tokencsrf $token;

    public function __construct(View $view, Session $session, Tokencsrf $token)
    {
        $this->view = $view;
        $this->session = $session;
        $this->token = $token;
    }


    public function displayHomeAction(Request $request, ContactValidator $contactValidator, Mailer $mailer): Response
    {
        $datasForm = [];

        if ($request->getMethod() === 'POST') {

              /*  if(!$this->token->isValid()){

                $this->session->addFlashes('error', ['Accees non autorisée']);
                return new Response('', 303, ['redirect' => 'login']);

            }*/

            $datasForm = $request->request()->all();

            if ($contactValidator->isValid($datasForm)) {

                $content = $this->view->render([
                    "template" => "bodyemail",
                    'data'=> ['message' => $datasForm],

                ]);


                $result = $mailer->sendMessage('Bonjour', $content, 'berni@yahoo.fr');
                
                $this->session->addFlashes(
                    'success',
                    ['Votre message a été énvoyé']
                );

                return new Response('', 303, ['redirect' => 'home']);
            } else {

                $this->session->addFlashes('', $contactValidator->getErrors());
            }
        }

        return new Response($this->view->render([
            'template' => 'home',
            'data' => ['datasin' => $datasForm],
        ]));
         //, 'data' => ['token'=> $this->token->generate()]
    }
}
