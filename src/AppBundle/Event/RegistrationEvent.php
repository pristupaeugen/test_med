<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use AppBundle\Entity\User;

class RegistrationEvent extends Event
{
    /**
     * @var User
     */
    private $user;

    /**
     * Set user
     *
     * @param User $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}