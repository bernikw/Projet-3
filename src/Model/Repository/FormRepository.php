<?php

declare(strict_types=1);

namespace App\Model\Repository;

class FormRepository
{

    public function formService($name, $firstname, $email, $message) 
    
    {
        $data = require 
        $transport = (new Swift_SmtpTransport($data['SMTP'], 443, 'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Message ' .$name. ' '.$firstname.'' ))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody($message);


            $mailer->send($message);
    }

}