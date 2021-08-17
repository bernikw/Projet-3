<?php

declare(strict_types=1);

namespace App\Controller\Frontoffice;



class FormController
{

    public function formService($name, $email, $message) 
    
    {
        $config = require_once"emailconfig.php";
    
       
        $transport = (new \Swift_SmtpTransport($config['emeilServer'], $config['port']))
            ->setUsername($config['email'])
            ->setPassword($config['password']);

            $mailer = (new \Swift_Mailer($transport));

            $message = (new \Swift_Message($name . 'Votre message a été envoyée'))
            ->setFrom($email)
            ->setTo($config['myemail'])
            ->setBody($message);


            $mailer->send($message);

    }

    public function registerService($email, $username) 
    
    {
        $config = require_once"emailconfig.php";
       

        $transport = (new \Swift_SmtpTransport($config['emeilServer'], $config['port']))
            ->setUsername($config['email'])
            ->setPassword($config['password']);

            $mailer = (new \Swift_Mailer($transport));

            $message = (new \Swift_Message('Confirmation de votre inscription' . $username))
            ->setFrom($email)
            ->setTo($config['myemail'])
            ->setBody('Votre inscription a bien été prise en compte');


            $mailer->send($message);
    }

}