<?php

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Event\RegistrationEvent;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $authUser =  $this->get('security.token_storage')->getToken()->getUser();

        if ($authUser && $authUser instanceof User) {
            return $this->redirectToRoute('app_home');
        }

        // build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $user->setIsActive(false);

            // save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // dispatch registration event
            $event = new RegistrationEvent();
            $event->setUser($user);

            $this->get("event_dispatcher")->dispatch('app.event.registration_event', $event);

            return $this->redirectToRoute('app_need_confirmation', array('id' => $user->getId()));
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function needConfirmAction(Request $request, $id)
    {
        $em   = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        return $this->render('registration/need_confirm.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * Confirmation action
     * @param $id
     * @param $sign
     */
    public function confirmationAction($id, $sign)
    {
        $em   = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')
            ->findOneBy(['id' => $id, 'salt' => $sign]);

        if ($user) {

            $user->setIsActive(true);

            // save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $token = new UsernamePasswordToken($user, null, "public", $user->getRoles());

            $this
                ->get("security.token_storage")
                ->setToken($token);

            return $this->redirectToRoute('app_congratulation');
        }

        return $this->render('registration/need_confirm.html.twig', [
            'user' => $user
        ]);
    }
}