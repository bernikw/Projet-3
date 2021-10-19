<?php

declare(strict_types=1);

namespace App\Service;

use Swift_TransportException;

class Mailer
{
    // private Environment $twig;
    private array $settings;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    public function sendMessage(string $subject, string $content, string $dest): bool
    {
        try {
            $transport = new \Swift_SmtpTransport($this->settings["smtp"], (int)$this->settings["smtp_port"]);

            $mailer = new \Swift_Mailer($transport);

            $message = new \Swift_Message();
            $message->setTo($dest);
            $message->setSubject($subject);
            $message->setFrom([$this->settings["from"] => $this->settings["sender"]]);
            $message->setBody(
                $content,
                'text/html'
            );
            $result = $mailer->send($message);
            if ($result === 1) {
                return true;
            }
            return false;
        } catch (Swift_TransportException $e) {
            return false;
        }
    }
}
