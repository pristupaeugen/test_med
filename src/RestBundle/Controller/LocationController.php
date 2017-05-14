<?php

// src/RestBundle/Controller/LocationController.php
namespace RestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use AppBundle\Entity\User;

use RestBundle\Entity\Token;
use RestBundle\Exception\InvalidCredentialsException;
use RestBundle\Exception\EmailIsNotConfirmedException;
use RestBundle\Exception\AuthenticationRequiredException;
use RestBundle\Exception\EmailNotExistException;

/**
 * Class LocationController
 * @package RestBundle\Controller
 */
class LocationController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Location",
     *  description = "Get countries list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Country",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getCountriesAction(Request $request)
    {
        $em        = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('AppBundle:Country')
                       ->findBy(['isActive' => 1]);

        return $countries;
    }
}