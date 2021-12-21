<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Repository\PostRepository;
use App\Service\Http\Session\Session;
use App\Model\Entity\Post;
use App\Service\Http\Request;
use App\Service\Validator\PostValidator;


final class AddpostController
{
    private View $view;
    private Session $session;
    private PostRepository $postRepository;


    public function __construct(View $view, Session $session, PostRepository $postRepository)
    {
        $this->view = $view;
        $this->session = $session;
        $this->postRepository = $postRepository;
    }
 

    public function displayAddPostAction(Request $request, PostValidator $postValidator): Response
    {
        $datas = [];

        if($request->getMethod() === 'POST'){

            $datas = $request->request()->all();

            if ($postValidator->isValid($datas)) {
     
                $post = new Post(0, $datas['titre'], $datas['text'], $datas['chapo'], $datas['pseudo'], $datas['date_creation'], $datas['date_update']);

                $this->postRepository->create($post);
            
                $this->session->addFlashes('success', ['Votre post a été enregistré']);
                return new Response('', 303, ['redirect' => 'login']);

            } else {

                $this->session->addFlashes('', $postValidator->getErrors());
            }

        }
    
        return new Response($this->view->render([
            'template' => 'addpost',
            'data' => [],
        ],'backoffice'));
    }


}