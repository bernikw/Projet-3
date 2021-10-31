<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\PostRepository;
use App\Model\Repository\CommentRepository;



final class AdminController
{
    private View $view;
    private Session $session;
    private PostRepository $postRepository;
    

    public function __construct(View $view, PostRepository $postRepository, Session $session)
    {
        $this->view = $view;
        $this->postRepository = $postRepository;
        $this->session = $session;
    }   

    public function displayAllPosts(): Response
    {
      
        $posts = $this->postRepository->findAll();

        return new Response($this->view->render([
            'template' => 'admin',
            'data' => ['posts' => $posts],
        ],'backoffice'));
    }

   /* public function deletePost(): void
    {
        $posts = $this->postRepository->find($id);
        $result = $posts->delete();

        if($result){
            $this->session->addFlashes('success', 'Votre article a été supprimée');
            return new Response('', 303, ['redirect' => 'admin']);
        }


    }*/
    
    public function displayAllComments(): Response
    {
        
        $comments = $this->commentRepository->findAll();

      return new Response($this->view->render(
            [
            'template' => 'admin',
            'data' => ['comments' => $comments],
            ],'backoffice'));
    
    } 
}