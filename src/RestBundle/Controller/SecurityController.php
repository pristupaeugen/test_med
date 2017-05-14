<?php

// src/RestBundle/Controller/SecurityController.php
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
 * Class SecurityController
 * @package RestBundle\Controller
 */
class SecurityController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Security",
     *  description = "User sign in",
     *  parameters={
     *      {"name"="email",    "dataType"="string", "format"="example@example.com", "required"=true, "description"="Email field"},
     *      {"name"="password", "dataType"="string", "required"=true, "description" = "Password field, at least 6 symbols"}
     *  },
     *  output={
     *    "class"="RestBundle\Entity\Token"
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     400 = "Email was not confirmed. Please confirm your email by the link send to your email | Email and password combination is incorrect"
     *   }
     * )
     */
    public function loginAction(Request $request)
    {
        $this->logoutAction($request);

        $data = json_decode($request->getContent(), true);
        if (!empty($data['email']) && !empty($data['password'])) {

            $em   = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')
                       ->findOneBy(['username' => $data['email']]);

            if ($user) {

                $isValid = $this->get('security.password_encoder')
                    ->isPasswordValid($user, $data['password'], $user->getSalt());

                if ($isValid) {

                    if (!$user->getIsActive())
                        throw new EmailIsNotConfirmedException('Email was not confirmed. Please confirm your email by the link send to your email');

                    if (!count($user->getTokens())) {

                        $passwordManager = $this->get('app.password_manager');
                        $xTokenHeader    = $passwordManager->generateStrongPassword(16);

                        try {
                            $xToken = new Token();
                            $xToken->setToken($xTokenHeader);

                            $user->addToken($xToken);

                            // save the User!
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($xToken);
                            $em->persist($user);
                            $em->flush();

                            $xToken->setUser($user);
                            $em->persist($xToken);
                            $em->flush();
                        }
                        catch (\Exception $e) {

                            $user->removeToken($xToken);
                        }
                    }

                    $token = new UsernamePasswordToken($user, null, "public", $user->getRoles());

                    $this
                        ->get("security.token_storage")
                        ->setToken($token);


                    return $user->getTokens()[0];
                }
            }
        }

        throw new InvalidCredentialsException('Email and password combination is incorrect');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @ApiDoc(
     *  section     = "Security",
     *  description = "Logout",
     *  output={
     *    "class"="RestBundle\Doc\OutputTrue"
     *  },
     *  statusCodes = {
     *     200 = "Successful"
     *   }
     * )
     */
    public function logoutAction(Request $request)
    {
        $this->get('security.token_storage')->setToken(null);

        return ['result' => true];
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * @ApiDoc(
     *  section     = "Security",
     *  description = "Get authenticated user",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  output={
     *    "class"="AppBundle\Entity\User"
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getAuthUserAction(Request $request)
    {
        $authUser = $this->get('security.token_storage')->getToken()->getUser();

        if ($authUser && $authUser instanceof User) {
            return $authUser;
        }

        throw new AuthenticationRequiredException('Authentication required');
    }

    /**
     * @param Request $request
     * @return bool
     *
     * @ApiDoc(
     *  section     = "Security",
     *  description = "Reset password",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  output={
     *    "class"="RestBundle\Doc\OutputTrue"
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     400 = "Email was empty",
     *     404 = "We couldn't find a OceansMHealth account connected with given email"
     *   }
     * )
     */
    public function resetPasswordAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (!empty($data['email'])) {

            $em   = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')
                ->findOneBy(['username' => $data['email']]);

            if ($user) {
                $passwordManager = $this->get('app.password_manager');
                $newPassword     = $passwordManager->generateStrongPassword();

                $password = $this->get('security.password_encoder')->encodePassword($user, $newPassword);
                $user->setPassword($password);

                // save the User!
                $em->persist($user);
                $em->flush();

                $message = \Swift_Message::newInstance('Reset Password')
                    ->setSubject('Reset Password')
                    ->setFrom($this->container->getParameter('app_bundle.mail.reset_password.from'), 'OceansmHealth')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView(
                            'emails/reset_password.html.twig',
                            array(
                                'user'         => $user,
                                'new_password' => $newPassword
                            )
                        ),
                        'text/html'
                    );

                $this->get('mailer')->send($message);

                return ['result' => $newPassword];
            }

            throw new EmailNotExistException('We couldn\'t find a OceansMHealth account connected with given email');
        }

        throw new InvalidCredentialsException('Email was empty');
    }
}