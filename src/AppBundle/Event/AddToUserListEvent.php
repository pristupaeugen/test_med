<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use AppBundle\Entity\User;
use AppBundle\Entity\Drug;

class AddToUserListEvent extends Event
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Drug
     */
    private $drug;

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

    /**
     * Set drug
     *
     * @param Drug $drug
     * @return $this
     */
    public function setDrug($drug)
    {
        $this->drug = $drug;

        return $this;
    }

    /**
     * Get drug
     * @return Drug
     */
    public function getDrug()
    {
        return $this->drug;
    }
}