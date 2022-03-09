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
use App\Service\AccessControl;
use App\Model\Repository\UserRepository;
use App\Service\Tokencsrf;

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

    public function displayAllPosts(AccessControl $accessControl): Response
    {
        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }
        $posts = $this->postRepository->findAll();

        return new Response($this->view->render([
            'template' => 'backarticle',
            'data' => ['posts' => $posts],
        ], 'backoffice'));
    }


    public function displayAddPostAction(Request $request, PostValidator $postValidator, AccessControl $accessControl, Tokencsrf $token): Response
    {

        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }
        $datas = [];

        if ($request->getMethod() === 'POST') {

          if(!$token->isValid()){

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);

            }

            $datas = $request->request()->all();

            if ($postValidator->isValid($datas)) {

                $user = $this->session->get('user');

                $post = new Post(0, $datas['title'], $datas['chapo'], $datas['content'], (string)NULL, (string)NULL, $user->getId(), $user->getUsername());

                $this->postRepository->create($post);

                $this->session->addFlashes('success', ['Votre post a été enregistré']);
                return new Response('', 303, ['redirect' => 'backarticle']);
            } 

                $this->session->addFlashes(
                    'error',
                    $postValidator->getErrors()
                );
            
        }

        return new Response($this->view->render([
            'template' => 'backaddarticle',
            'data' => ['datassaisi' => $datas, 'token'=> $token->generate()],
        ], 'backoffice'));
    }


    public function displayEditPostAction(Request $request, PostValidator $postValidator, UserRepository $userRepository, AccessControl $accessControl, Tokencsrf $token): Response
    {
        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }

        $post = $this->postRepository->find((int)$request->query()->get('id'));
    
       
        $users = $userRepository->findByAdmin();

     
        if ($request->getMethod() === 'POST') {

           if(!$token->isValid()){

                $this->session->addFlashes('error', ['Token non valid']);
                return new Response('', 303, ['redirect' => 'login']);

            }

            $datas = $request->request()->all();

            if ($postValidator->isValid($datas)) {

          
                $post->setTitle($datas['title']);
                $post->setChapo($datas['chapo']);
                $post->setContent($datas['content']);
                $post->setUserId((int)$datas['author']);
           
                     
                $this->postRepository->update($post);

                $this->session->addFlashes('success', ['Votre post a été modifiée']);

                return new Response('', 303, ['redirect' => 'backarticle']);

            } 

                $this->session->addFlashes(
                    'error',
                    $postValidator->getErrors()
                );
            
        }
        return new Response($this->view->render([
            'template' => 'backeditarticle',
            'data' => ['post' => $post, 'users' => $users, 'token'=> $token->generate()],
        ], 'backoffice'));
    }
   

    public function deletePost($id, AccessControl $accessControl)
    {

        if ($accessControl->isAdmin() === false) {

            return new Response('', 303, ['redirect' => 'login']);
        }

        $posts = $this->postRepository->delete($id);

        $this->session->addFlashes('success', ['Votre article a été supprimée']);

        return new Response('', 303, ['redirect' => 'backarticle', 'data' => ['posts' => $posts]]);
    }
}
