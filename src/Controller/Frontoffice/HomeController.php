<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Service\Http\Request;
use App\View\View;
use App\Service\Http\Response;
use App\Service\Validator\ContactValidator;
use App\Service\Http\Session\Session;


final class HomeController
{
    private View $view;
    private Session $session;

    public function __construct(View $view, Session $session)
    {
        $this->view = $view;
        $this->session = $session;
    }


    public function displayHomeAction(Request $request, ContactValidator $contactValidator): Response
    {

        if ($request->getMethod() === 'POST') {

            $datasForm = $request->request()->all();

            if ($contactValidator->isValid($datasForm)) {
                $content = $this->view->render([
                    "template" => "home",

                ]);

                $this->session->addFlashes(
                    'success',
                    ['Votre message a été énvoyé']
                );
            } else {

                $this->session->addFlashes('', $contactValidator->getErrors());
                return new Response('', 303, ['redirect' => 'home']);
            }
        }

        return new Response($this->view->render([
            'template' => 'home',
            'data' => [],
        ]));
    }
}