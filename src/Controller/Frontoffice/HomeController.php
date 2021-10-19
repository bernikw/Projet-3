<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Service\Http\Request;
use App\View\View;
use App\Service\Http\Response;
use App\Service\Validator\ContactValidator;




final class HomeController
{
    private View $view;
    

    public function __construct(View $view)
    {
        $this->view = $view;
    }


    public function displayHomeAction(Request $request, ContactValidator $contactValidator): Response
    {

        if ($request->getMethod() === 'POST') {
            $result = $contactValidator->isValid
            ($request->request()->all());
            if($result){

            
                var_dump('formulaire ok');

            }else{
               
                var_dump($contactValidator->getErrors());
        
            }
            die();
        }


        return new Response($this->view->render([
            'template' => 'home',
            'data' => [],
        ]));
    }
}
