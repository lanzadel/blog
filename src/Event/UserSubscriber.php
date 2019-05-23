<?php
/**
 * Created by IntelliJ IDEA.
 * User: ADMINIBM
 * Date: 25/04/2019
 * Time: 23:55
 */

namespace App\Event;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserSubscriber implements EventSubscriberInterface
{
    /**
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
          UserRegisterEvent::NAME => 'onUserRegister'
        ];
    }

    public function onUserRegister(UserRegisterEvent $event)
    {
        $body = $this->twig->render('email/registration.html.twig', [
            'user' => $event->getRegisteredUser()
        ]);
        $message = (new \Swift_Message())
            ->setFrom('micropost@gmail.com')
            ->setTo($event->getRegisteredUser()->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }
}
