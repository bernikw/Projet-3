<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Repository\PostRepository;



final class AdminController
{
    private PostRepository $postRepository;
    private View $view;

    public function __construct(PostRepository $postRepository, View $view)
    {
        $this->postRispository = $postRepository;
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