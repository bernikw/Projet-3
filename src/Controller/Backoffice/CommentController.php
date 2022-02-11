<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\CommentRepository;



final class CommentController
{
    private View $view;
    private Session $session;
    private CommentRepository $commentRepository;


    public function __construct(View $view, CommentRepository $commentRepository, Session $session)
    {
        $this->view = $view;
        $this->commentRepository = $commentRepository;
        $this->session = $session;
    }


    public function displayAllComments(): Response
    {

        $comments = $this->commentRepository->findAll();

        return new Response($this->view->render(
            [
                'template' => 'backcomment',
                'data' => ['comments' => $comments],
            ],
            'backoffice'
        ));
    }

    public function validComment($comment)
    {
        $comments = $this->commentRepository->update($comment);

        $this->session->addFlashes('success', ['Votre commentaire a été validée']);

        return new Response('', 303, ['redirect' => 'backcomment', 'data' => ['comment' => $comments]]);
        
    }

    public function deleteComment($id)
    {

        $comments = $this->commentRepository->delete($id);

        $this->session->addFlashes('success', ['Votre commentaire a été supprimée']);

        return new Response('', 303, ['redirect' => 'backcomment', 'data' => ['comment' => $comments]]);
       
    }
}
