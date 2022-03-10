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
use App\Service\Tokencsrf;



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

    public function displayAddComment(Request $request, CommentValidator $commentValidator, Tokencsrf $token): Response
    {
        $datas = [];

        if ($request->getMethod() === 'POST') {

            if (!$token->isValid()) {

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);
            }

            $datas = $request->request()->all();

            if ($commentValidator->isValid($datas)) {

                $user = $this->session->get('user');

                $comment = new Comment(0, $user->getUsername(), $datas['text_comment'], (string)NULL, 0, (int)$datas['id'], $user->getId());

                $this->commentRepository->create($comment);

                $this->session->addFlashes('success', ['Votre message a été posté']);
                return new Response('', 303, ['redirect' => 'post']);
            }

            $this->session->addFlashes('danger',
                $commentValidator->getErrors());
        }

        return new Response($this->view->render(
            [
                'template' => 'post',
                'data' => ['datassaisi' => $datas, 'token' => $token->generate()]
            ]
        ));
    }
}
