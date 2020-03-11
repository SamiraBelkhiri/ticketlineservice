<?php


namespace App\Entity;


class Mail
{
    private $senderEmail;
    private $receiverEmail;
    private $content;

    public function __construct(string $receiverEmail, string $senderEmail)
    {
        $this->senderEmail = $senderEmail;
        $this->receiverEmail = $receiverEmail;
    }

    public function mailTo(\Swift_Message $mailer) {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom($this->senderEmail)
            ->setTo($this->receiverEmail)
            ->setBody($this->content,
                'text/plain'
            );

        $mailer->send($message);
    }

}