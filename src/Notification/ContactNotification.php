<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(Environment $renderer){

    }

    public function notify(Contact $contact){
        $message = (new \Swift_Message('Agence : ' . $contact->getContact()->getSujet()))
            ->setFrom($contact->getMail())
            ->setTo('teddyhemonet.pro@gmail.com')
            ->setReplyTo($contact->getMail())
            ->setBody($contact->getMessage());
        $this->mailer->send($message);
    }
}