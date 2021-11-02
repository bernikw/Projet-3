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
            $result = $contactValidator->isValid($request->request()->all());
            if($result){


                $content = $this->view->render([
                    "template" => "home",
     
                ]);


               $this->session->addFlashes('success', 'Votre message a été énvoyé');

            }else{
                  
                $this->session->addFlashes('', 'Tous les champs ne sont pas remplis ou ne sont pas corrects');
                return new Response('', 303, ['redirect' => 'home']);
            
        
            }
        
        }

        return new Response($this->view->render([
            'template' => 'home',
            'data' => [],
        ]));
    }
}
