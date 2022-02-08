<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\Frontoffice\PostController;
use App\Controller\Frontoffice\UserController;
use App\Controller\Frontoffice\HomeController;
use App\Controller\Frontoffice\RegistrationController;
use App\Controller\Frontoffice\CommentFrontController;
use App\Controller\Backoffice\AdminController;
use App\Controller\Backoffice\AddpostController;
use App\Controller\Backoffice\CommentController;
use App\Controller\Backoffice\ArticleController;
use App\Controller\Backoffice\EditpostController;
use App\Controller\Backoffice\UserAdminController;
use App\Model\Repository\PostRepository;
use App\Model\Repository\CommentRepository;
use App\Model\Repository\UserRepository;
use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Service\Validator\ContactValidator;
use App\Service\Validator\LoginValidator;
use App\Service\Validator\RegisterValidator;
use App\Service\Validator\PostValidator;
use App\View\View;
use App\Service\Database;
use App\Service\Validator\CommentValidator;
use App\Service\AccessControl;
use App\Service\Validator\UserValidator;


final class Router
{


    private Database $database;
    private View $view;
    private Request $request;
    private Session $session;
    private Mailer $mailer;
    private AccessControl $accessControl;



    public function __construct(Request $request)
    {
        // dépendance

        $this->database = new Database('localhost', 'myblog','root','');
        $this->session = new Session();
        $this->view = new View($this->session);
        $this->request = $request;
        $this->accessControl = new AccessControl($this->session);

        $setting = [
            "smtp" => "localhost",
            "smtp_port" => 1025,
            "from" => "bw@blog.fr",
            "sender" => "Bernadetta"
        ];
 
        $this->mailer = new Mailer($setting);
    }

    public function run(): Response
    {

        $action = $this->request->query()->has('action') ? $this->request->query()->get('action') : 'home';

        //Déterminer sur quelle route nous sommes // Attention algorithme naïf

        // *** @Route http://localhost:8000/?action=posts ***
        if ($action === 'posts') {
            //injection des dépendances et instanciation du controller
            $postRepo = new PostRepository($this->database);
            $controller = new PostController($postRepo, $this->view);

            return $controller->displayAllAction();

            // *** @Route http://localhost:8000/?action=post&id=5 ***
        } elseif ($action === 'post' && $this->request->query()->has('id')) {
            //injection des dépendances et instanciation du controller
            $postRepo = new PostRepository($this->database);
            $controller = new PostController($postRepo, $this->view);
            $commentRepo = new CommentRepository($this->database);

            return $controller->displayOneAction((int) $this->request->query()->get('id'), $commentRepo);

            // *** @Route http://localhost:8000/?action=login ***
        } elseif ($action === 'login') {
            $userRepo = new UserRepository($this->database);
            $loginValidator = new LoginValidator;
            $controller = new UserController($userRepo, $this->view, $this->session );

            return $controller->loginAction($this->request, $loginValidator, $this->accessControl);

            // *** @Route http://localhost:8000/?action=logout ***
        } elseif ($action === 'logout') {
            $userRepo = new UserRepository($this->database);
            $controller = new UserController($userRepo, $this->view, $this->session);

            return $controller->logoutAction();

            // *** @Route http://localhost:8000/?action=home ***
        } elseif ($action === 'home') {

            $controller = new HomeController($this->view, $this->session, $this->accessControl);
            $contactValidator = new ContactValidator();


            return $controller->displayHomeAction($this->request, $contactValidator, $this->mailer);


            // *** @Route http://localhost:8000/?action=registration ***
        } elseif ($action === 'registration') {

            $userRepository = new UserRepository($this->database);
            $controller = new RegistrationController($this->view, $this->session, $userRepository);
            $registerValidator = new RegisterValidator($userRepository);


            return $controller->displayRegistrationAction($this->request, $this->mailer, $registerValidator);

             // *** @Route http://localhost:8000/?action=backarticle ***
        } elseif ($action === 'backarticle') {

            $postRepository = new PostRepository($this->database);
            $controller = new ArticleController($this->view, $postRepository, $this->session, $this->accessControl);

            return $controller->displayAllPosts();


            // *** @Route http://localhost:8000/?action=backaddarticle ***
        } elseif ($action === 'backaddarticle') {

            $postRepository = new PostRepository($this->database);
            $postValidator = new PostValidator($postRepository);
            $controller = new ArticleController($this->view,  $postRepository, $this->session, $this->accessControl);

            return $controller->displayAddPostAction($this->request, $postValidator);

            // *** @Route http://localhost:8000/?action=backeditarticle ***
        } elseif ($action === 'backeditarticle' && $this->request->query()->has('id')) {

            $postRepo = new PostRepository($this->database);
            $postValidator = new PostValidator($postRepo);
            $controller = new ArticleController($this->view, $postRepo, $this->session, $this->accessControl);

            return $controller->displayEditPostAction($this->request, $postValidator, $this->request->query()->has('id') );

            // *** @Route http://localhost:8000/?action=deletepost ***
        } elseif ($action === 'deletepost' && $this->request->query()->has('id')) {

            $postRepo = new PostRepository($this->database);
            $controller = new ArticleController($this->view, $postRepo, $this->session, $this->accessControl);

            return $controller->deletePost((int) $this->request->query()->get('id'));


             // *** @Route http://localhost:8000/?action=backcomment ***
        } elseif ($action === 'backcomment') {

            $commentRepo = new CommentRepository($this->database);
            $controller = new CommentController($this->view, $commentRepo, $this->session, $this->accessControl);

            return $controller->displayAllComments($this->request);

         
            // *** @Route http://localhost:8000/?action=addcomment ***
        } elseif ($action === 'addcomment' && $this->request->query()->has('id')) {

            $commentRepo = new CommentRepository($this->database);
            $controller = new CommentFrontController($commentRepo, $this->view, $this->session, $this->accessControl);
            $commentValid = new CommentValidator($commentRepo); 

            return $controller->displayAddComment($this->request, $commentValid,(int) $this->request->query()->get('id') );
   

             // *** @Route http://localhost:8000/?action=deletecomment ***
        } elseif ($action === 'deletecomment' && $this->request->query()->has('id')) {

            $commentRepo = new CommentRepository($this->database);
            $controller = new CommentController ($this->view, $commentRepo, $this->session, $this->accessControl);

            return $controller->deleteComment((int) $this->request->query()->get('id'));

             // *** @Route http://localhost:8000/?action=validcomment ***
        } elseif ($action === 'validcomment' && $this->request->query()->has('id')) {

            $commentRepo = new CommentRepository($this->database);
            $controller = new CommentController ($this->view, $commentRepo, $this->session, $this->accessControl);

            return $controller->validComment((int) $this->request->query()->get('id'));


         // *** @Route http://localhost:8000/?action=backuser ***
            } elseif ($action === 'backuser') {

                $userRepo = new UserRepository($this->database);
                $controller = new UserAdminController($this->view, $userRepo, $this->session, $this->accessControl);

            return $controller->displayAllUsers();

            // *** @Route http://localhost:8000/?action=backedituser&id= ***
        } elseif ($action === 'backedituser' && $this->request->query()->has('id')) {

            $userRepo = new UserRepository($this->database);
            $userValidator = new UserValidator();
            $controller = new UserAdminController($this->view, $userRepo, $this->session, $this->accessControl);

        return $controller->displayEditUser($this->request, $userValidator);

          // *** @Route http://localhost:8000/?action=deleteuser ***
        } elseif ($action === 'deleteuser' && $this->request->query()->has('id')) {

            $userRepo = new UserRepository($this->database);
            $controller = new UserAdminController($this->view, $userRepo, $this->session, $this->accessControl);

            return $controller->deleteUser((int) $this->request->query()->get('id'));


        }
        
        return new Response('', 303, ['redirect' => 'posts'], 404);
    }
}
