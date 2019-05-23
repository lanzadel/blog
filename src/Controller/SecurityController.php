<?php
/**
 * Created by IntelliJ IDEA.
 * User: ADMINIBM
 * Date: 20/04/2019
 * Time: 23:33
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        return new Response($this->twig->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {

    }
}
