<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\Frontoffice\PostController;
use App\Controller\Frontoffice\UserController;
use App\Controller\Frontoffice\HomeController;
use App\Controller\Frontoffice\RegistrationController;
use App\Controller\Backoffice\AdminController;
use App\Controller\Backoffice\AddpostController;
use App\Controller\Backoffice\EditpostController;
use App\Controller\Backoffice\EditcommentController;
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


final class Router
{


    private Database $database;
    private View $view;
    private Request $request;
    private Session $session;
    private Mailer $mailer;



    public function __construct(Request $request)
    {
        // dépendance
        $this->database = new Database('localhost', 'myblog','root','');
        $this->session = new Session();
        $this->view = new View($this->session);
        $this->request = $request;

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
            $controller = new UserController($userRepo, $this->view, $this->session);



            return $controller->loginAction($this->request, $loginValidator);

            // *** @Route http://localhost:8000/?action=logout ***
        } elseif ($action === 'logout') {
            $userRepo = new UserRepository($this->database);
            $controller = new UserController($userRepo, $this->view, $this->session);

            return $controller->logoutAction();

            // *** @Route http://localhost:8000/?action=home ***
        } elseif ($action === 'home') {

            $controller = new HomeController($this->view, $this->session);
            $contactValidator = new ContactValidator();


            return $controller->displayHomeAction($this->request, $contactValidator, $this->mailer);


            // *** @Route http://localhost:8000/?action=registration ***
        } elseif ($action === 'registration') {

            $userRepository = new UserRepository($this->database);
            $controller = new RegistrationController($this->view, $this->session, $userRepository);
            $registerValidator = new RegisterValidator($userRepository);


            return $controller->displayRegistrationAction($this->request, $this->mailer, $registerValidator);

            // *** @Route http://localhost:8000/?action=admin ***
        } elseif ($action === 'admin') {

            $postRepo = new PostRepository($this->database);
            $controller = new AdminController($this->view, $postRepo, $this->session);

            return $controller->displayAllPosts();

            // *** @Route http://localhost:8000/?action=addpost ***
        } elseif ($action === 'addpost') {

            $postRepository = new PostRepository($this->database);
            $postValidator = new PostValidator;
            $controller = new AddpostController($this->view, $this->session, $postRepository);

            return $controller->displayAddpostAction($this->request, $postValidator);

            // *** @Route http://localhost:8000/?action=editpost ***
        } elseif ($action === 'editpost') {

            $postRepo = new PostRepository($this->database);
            $controller = new EditpostController($this->view, $postRepo, $this->session);

            return $controller->displayEditpostAction();

            // *** @Route http://localhost:8000/?action=deletepost ***
        } elseif ($action === 'deletepost') {

            $postRepo = new PostRepository($this->database);
            $controller = new AdminController($this->view, $postRepo, $this->session);

            return $controller->deletePost($id);

            // *** @Route http://localhost:8000/?action=editcomment ***
        } elseif ($action === 'editcomment') {

            $controller = new EditcommentController($this->view);

            return $controller->displayEditcommentAction();
        }

        return new Response('', 303, ['redirect' => 'posts'], 404);
    }
}
