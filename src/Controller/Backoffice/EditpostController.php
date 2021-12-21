<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Repository\PostRepository;
use App\Model\Entity\Post;
use App\Service\Http\Session\Session;


final class EditpostController
{
    private View $view;
    private PostRepository $postRepository;
    private Session $session;

    public function __construct(View $view, PostRepository $postRepository, Session $session)
    {     
        $this->view = $view;
        $this->postRepository = $postRepository;
        $this->session = $session;
    }

    

    public function displayEditpostAction(): Response
    {
        

        return new Response($this->view->render([
            'template' => 'editpost',
            'data' => [],
        ],'backoffice'));
    }
}