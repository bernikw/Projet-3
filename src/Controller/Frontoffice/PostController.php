<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Repository\PostRepository;
use App\Model\Repository\CommentRepository;
use App\Service\Http\Request;
use App\Service\Validator\CommentValidator;
use App\Service\Http\Session\Session;
use App\Service\Tokencsrf;
use App\Model\Entity\Comment;


final class PostController
{
    private PostRepository $postRepository;
    private View $view;

    public function __construct(PostRepository $postRepository, View $view)
    {
        $this->postRepository = $postRepository;
        $this->view = $view;
    }

    public function displayOneAction(int $id, CommentRepository $commentRepository, Request $request, 
    Tokencsrf $token, CommentValidator $commentValidator, Session $session): Response
    {

       
        $post = $this->postRepository->findOneBy(['id' => $id]);

        $comments = $commentRepository->findBy(['article_id' => $id]);

        if ($post === null) {
            $response = new Response('', 303, ['redirect' => 'posts'], 404);
        }
 
        $datas = [];

        

        if ($request->getMethod() === 'POST') {

           if (!$token->isValid()) {

                $session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'post']);
            }

            $datas = $request->request()->all();

            if ($commentValidator->isValid($datas)) {

                $user = $session->get('user');

                $comment = new Comment(0, $user->getUsername(), $datas['text_comment'], (string)NULL, 0, (int)$datas['id'], $user->getId());

                $commentRepository->create($comment);

                $session->addFlashes('success', ['Votre message a été posté']);
                return new Response('', 303, ['redirect' => 'post']);
            }

            $this->session->addFlashes('danger',
                $commentValidator->getErrors());
        }

        $response = new Response($this->view->render(
            [
                'template' => 'post',
                'data' => [
                    'post' => $post,
                    'comments' => $comments,
                    'token' => $token->generate(),
                    'datassaisi' => $datas
                ],
            ],
        ));

        return $response;

    }

    public function displayAllAction(): Response
    {
        $posts = $this->postRepository->findAll();

        return new Response($this->view->render([
            'template' => 'posts',
            'data' => ['posts' => $posts],
        ]));
    }

}