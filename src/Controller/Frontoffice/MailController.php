<?php

declare(strict_types=1);

namespace  App\Controller\Frontoffice;

use App\Service\Http;

 final class MailController

 
 {

        public function index($name, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->view->render(['template' => 'registration', 'data'=>[]]));
            
            )

        
            ->addPart(
                $this->view->render(['template' => 'registration', 'data'=>[]]));
             ),
         )
      ;

        $mailer->send($message);

        return $this->render(...);
    }

 }