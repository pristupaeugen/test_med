<?php

namespace RestBundle\Security;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\RouterInterface;

use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use Doctrine\ORM\EntityManager;

use RestBundle\Exception\AuthenticationRequiredException;

use RestBundle\Exception\ApplicationKeyIsNotSetException;
use RestBundle\Exception\ApplicationKeyNotExistException;

use RestBundle\Exception\EmailIsNotConfirmedException;

use RestBundle\Exception\TokenIsNotSetException;
use RestBundle\Exception\TokenNotExistException;


/**
 * Class ApiTokenAuthenticator
 * @package RestBundle\Security
 */
class RestTokenAuthenticator extends AbstractGuardAuthenticator
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * RestTokenAuthenticator constructor.
     * @param EntityManager $em
     * @param RouterInterface $router
     * @param ContainerInterface $container
     */
    public function __construct(EntityManager $em, RouterInterface $router, ContainerInterface $container)
    {
        $this->em        = $em;
        $this->router    = $router;
        $this->container = $container;
    }

    /**
     * Get service from container by service id
     * @param string $serviceId
     *
     * @return object service
     */
    public function get($serviceId)
    {
        return $this->container->get($serviceId);
    }

    /**
     * @param Request $request
     * @return array|string
     */
    public function getCredentials(Request $request)
    {
        $applicationKey = $request->headers->get('appkey');
        if (empty($applicationKey))
            throw new ApplicationKeyIsNotSetException('Application key is not undefined');

        if (!in_array($applicationKey, $this->getApplicationKeys()))
            throw new ApplicationKeyNotExistException('Application key doesn\'t exist');

        $xTokenHeader = $request->headers->get('token');
        if (empty($xTokenHeader))
            throw new TokenIsNotSetException('Token is not undefined');

        return ($xTokenHeader) ? ['token' => $xTokenHeader] : null;
    }

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $tokenProvider
     * @return null
     */
    public function getUser($credentials, UserProviderInterface $tokenProvider)
    {
        $apiKey = $credentials['token'];
        $token  = $tokenProvider->loadUserByUsername($apiKey);

        if (!$token)
            throw new TokenNotExistException('Invalid credentials');

        return $token->getUser();
    }

    /**
     * @param mixed $credentials
     * @param UserInterface $user
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        if (!$user->getIsActive())
            throw new EmailIsNotConfirmedException('Email was not confirmed. Please confirm your email by the link send to your email');

        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return;
    }

    public function supportsRememberMe()
    {
        return;
    }

    /**
     * @param Request $request
     * @param AuthenticationException|null $authException
     * @return JsonResponse
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        throw new AuthenticationRequiredException('Authentication required');
    }

    /**
     * Get application keys
     * @return array
     */
    private function getApplicationKeys()
    {
        return [
            $this->container->getParameter('rest_bundle.application_keys.ios'),
            $this->container->getParameter('rest_bundle.application_keys.android')];
    }
}