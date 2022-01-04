<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;
use App\View\View;
use App\Service\Http\Response;
use App\Model\Entity\Comment;
use App\Model\Repository\CommentRepository;
use App\Service\Http\Request;
use App\Service\Validator\CommentValidator;
use App\Service\Http\Session\Session;


final class CommentController
{
    private CommentRepository $commentRepository;
    private View $view;

    public function __construct(CommentRepository $commentRepository, View $view)
    {
        $this->commentRepository = $commentRepository;
        $this->view = $view;
    }


public function displayAddComment(Request $request, CommentValidator $commentValidator): Response
    {
        $datas = [];

        if ($request->getMethod() === 'POST') 
        {
            $datas = $request->request()->all();

            if ($commentValidator->isValid($datas)) 
            {
                
                if(!$datas){
                    return false;
                }

                $comment = new Comment(0, $datas['pseudo'], $datas['text'], $datas['date_comment'], $datas['idPost']);
                
/*verifier si utilisateur est connecte, la session */
                $this->commentRepository->create($comment);
                $this->session->get('comment', $comment);
        

                $this->session->addFlashes('success', ['Votre message a été posté']);
                return new Response('', 303, ['redirect' => 'post']);

            } else {

            $this->session->addFlashes('',
                $commentValidator->getErrors());
            } 
        }
        
        return new Response($this->view->render(
            [
                'template' => 'post',
                'data' => [
                    'datas.text_comment ' => $datas,
                ],
            ],
        )); 
    }   
}