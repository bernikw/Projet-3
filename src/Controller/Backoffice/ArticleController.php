<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\PostRepository;
use App\Model\Entity\Post;
use App\Service\Http\Request;
use App\Service\Validator\PostValidator;



final class ArticleController
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
            'template' => 'article',
            'data' => ['posts' => $posts],
        ], 'backoffice'));
    }


    public function displayAddPostAction(Request $request, PostValidator $postValidator): Response
    {
        $datas = [];

        if ($request->getMethod() === 'POST') {

            $datas = $request->request()->all();

            if (!$datas) {
                return false;
            }

            if ($postValidator->isValid($datas) && $this->session->set('user', $datas)) {


                $post = new Post(0, $datas['title'], NULL, NULL, $datas['user_id'], $datas['chapo'], $datas['text']);

                $this->postRepository->create($post);

                $this->session->addFlashes('success', ['Votre post a été enregistré']);
                return new Response('', 303, ['redirect' => 'article']);
                
            } else {

                $this->session->addFlashes(
                    'error',
                    $postValidator->getErrors()
                );
            }
        }

        return new Response($this->view->render([
            'template' => 'addpost',
            'data' => [],
        ], 'backoffice'));
    }

    public function displayEditpostAction($id): Response
    {
        $post = $this->postRepository->findOneBy(['id' => $id]);

        return new Response($this->view->render([
            'template' => 'editpost',
            'data' => [],
        ], 'backoffice'));
    }


    public function deletePost($id)
    {

        $posts = $this->postRepository->delete($id);

        $this->session->addFlashes('success', ['Votre article a été supprimée']);

        return new Response('', 303, ['redirect' => 'article', 'data' => ['posts' => $posts]]);
    }
}
