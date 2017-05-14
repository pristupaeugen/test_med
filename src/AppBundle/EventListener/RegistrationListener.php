<?php

namespace AppBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;

use AppBundle\Exception\Registration\UserIsNotSetException;

/**
 * Class RegistrationListener
 * @package AppBundle\EventListener
 */
class RegistrationListener
{
    /**
     * @var ContainerInterface
     */
    private $_container;

    /**
     * RegistrationListener constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->_container = $container;
    }

    /**
     * Get service from container by service id
     * @param string $serviceId
     *
     * @return object service
     */
    public function get($serviceId)
    {
        return $this->_container->get($serviceId);
    }

    /**
     * @param \AppBundle\Event\RegistrationEvent $event
     */
    public function onRegistredEvent($event)
    {
        try {

            $user = $event->getUser();
            if (!$user)
                throw new UserIsNotSetException();

            $this->_sendConfirmEmail($user);
        }
        catch (UserIsNotSetException $e) {

        }
    }

    /**
     * Send confirm email
     * @param \AppBundle\Entity\User $user
     */
    protected function _sendConfirmEmail($user)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Confirm Email')
            ->setFrom($this->_container->getParameter('app_bundle.mail.confirm_email.from'))
            ->setTo($user->getEmail())
            ->setBody(
                $this->get('twig')->render(
                    'emails/confirm_email.html.twig',
                    array(
                        'user' => $user
                    )
                ),
                'text/html'
            );

        $this->get('mailer')->send($message);
    }
}