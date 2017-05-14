<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Form\LoginType;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $authUser =  $this->get('security.token_storage')->getToken()->getUser();

        if ($authUser && $authUser instanceof User) {
            return $this->redirectToRoute('app_home');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);
        $form->get('email')->setData($lastUsername);

        return $this->render('security/login.html.twig', array(
            'form'  => $form->createView(),
            'error' => $error,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logoutAction(Request $request)
    {
        $this->get('security.token_storage')->setToken(null);
        return $this->redirectToRoute('app_home');
    }
}