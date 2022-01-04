<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Model\Repository\PostRepository;
use App\Model\Repository\CommentRepository;


final class PostController
{
    private PostRepository $postRepository;
    private View $view;

    public function __construct(PostRepository $postRepository, View $view)
    {
        $this->postRepository = $postRepository;
        $this->view = $view;
    }

    public function displayOneAction(int $id, CommentRepository $commentRepository): Response
    {
        $post = $this->postRepository->findOneBy(['id' => $id]);

        $comments = $commentRepository->findBy(['article_id' => $id]);

        $response = new Response('', 303, ['redirect' => 'posts'], 404);


        if ($post !== null) {
            $response = new Response($this->view->render(
                [
                    'template' => 'post',
                    'data' => [
                        'post' => $post,
                        'comments' => $comments,
                    ],
                ],
            ));
        }

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