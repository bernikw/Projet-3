<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;


final class AdminController
{
    private View $view;

    public function __construct(View $view)
    {
       
        $this->view = $view;
    }

    

    public function displayAdminAction(): Response
    {
     
        return new Response($this->view->render([
            'template' => 'admin',
            'data' => [],
        ],'backoffice'));
    }
}