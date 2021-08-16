<?php

declare(strict_types=1);

namespace App\Controller\Frontoffice;

use PHP_CodeSniffer\Config;

class FormController
{

    public function formService($name, $firstname, $email, $message) 
    
    {
        $data = require __DIR__ '/../Config/mail.php';
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

    public function registerService($username, $email) 
    
    {
        $data = require_once __DIR__ '/../Config/mail.php';
        $transport = (new Swift_SmtpTransport($data['SMTP'], 443, 'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Confirmer votre inscription'  .$username.'' ))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody('Inscription a été enregistrée');


            $mailer->send($message);
    }

}