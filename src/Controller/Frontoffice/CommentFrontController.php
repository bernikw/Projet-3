<?php

declare(strict_types=1);

namespace App\Controller\Frontoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Entity\Comment;
use App\Model\Repository\CommentRepository;
use App\Service\Http\Request;
use App\Service\Validator\CommentValidator;
use App\Service\Http\Session\Session;



final class CommentFrontController
{
    private CommentRepository $commentRepository;
    private View $view;
    private Session $session;

    public function __construct(CommentRepository $commentRepository, View $view, Session $session)
    {
        $this->commentRepository = $commentRepository;
        $this->view = $view;
        $this->session = $session;
    }

    public function displayAddComment(Request $request, CommentValidator $commentValidator): Response
    {
        $datas = [];

        if ($request->getMethod() === 'POST') {
            $datas = $request->request()->all();

            if ($commentValidator->isValid($datas)) 
            {

                $comment = new Comment(0, 'Ernest', $datas['text_comment'], date('Y - m - d'), 0, 2,  'Ernest');

            
                $this->commentRepository->create($comment);

                $this->session->addFlashes('success', ['Votre message a été posté']);
                return new Response('', 303, ['redirect' => 'post']);
                
            } else {

                $this->session->addFlashes('',
                    $commentValidator->getErrors()
                );
            }
        }

        return new Response($this->view->render(
            [
                'template' => 'post',
                'data' => [
                    'datassaisi.text' => $datas,
                ],
            ],
        ));
    }
}
