<?php


namespace App\Listener;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

/**
 * Class LogoutListener
 * @package App\Listener
 */
class LogoutListener implements LogoutHandlerInterface
{
/*TODO: custom operation on logout action pour supprimer les connexions qui deviennent inactive */


    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        dd("hello");
    }
}