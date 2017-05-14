<?php

namespace RestBundle\Controller;

use RestBundle\Exception\FormException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Event\RegistrationEvent;

use RestBundle\Exception\EmailNotExistException;

/**
 * Class RegistrationController
 * @package RestBundle\Controller
 */
class RegistrationController extends FOSRestController
{
    /**
     * @param Request $request
     * @return User|\Symfony\Component\Form\Form
     *
     * @ApiDoc(
     *  section     = "Registration",
     *  description = "Registration",
     *  parameters={
     *      {"name"="firstname", "dataType"="string", "required"=true, "description"="Firstname field, at least 2 symbols"},
     *      {"name"="surname",   "dataType"="string", "required"=true, "description"="Surname field, at least 2 symbols"},
     *      {"name"="email",     "dataType"="string", "format"="example@example.com", "required"=true, "description"="Email field"},
     *      {"name"="password",  "dataType"="string", "required"=true, "description" = "Password field, at least 6 symbols"}
     *  },
     *  output={
     *    "class"="AppBundle\Entity\User"
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     400 = "Form validation error"
     *   }
     * )
     */
    public function registerAction(Request $request)
    {
        // build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user, array('csrf_protection' => false));

        // handle the submit (will only happen on POST)
        $data = json_decode($request->getContent(), true);
        $data['plainPassword']['first'] = $data['plainPassword']['second'] = $data['password'];
        unset($data['password']);

        $form->submit($data);
        if ($form->isValid()) {

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

            return $user;
        }

        $formErrorConvertorManager = $this->get('rest.rest_form_error_convertor');
        throw new FormException($formErrorConvertorManager->getErrorMessage($form));
    }
}
