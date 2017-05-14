<?php

namespace AppBundle\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Entity\Reminder;

use AppBundle\Exception\UserActions\DrugIsNotSetException;
use AppBundle\Exception\UserActions\UserIsNotSetException;

use AppBundle\Event\AddToUserListEvent;
use AppBundle\Event\RemoveFromUserListEvent;

/**
 * Class UserActionsListener
 * @package AppBundle\EventListener
 */
class UserActionsListener
{
    /**
     * @var TokenStorageInterface
     */
    private $_tokenStorage;

    /**
     * @var EntityManagerInterface
     */
    private $_entityManager;

    /**
     * SearchListener constructor.
     * @param TokenStorageInterface $tokenStorage
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->_tokenStorage  = $tokenStorage;
        $this->_entityManager = $entityManager;
    }

    /**
     * Get token storage
     *
     * @return object service
     */
    public function getTokenStorage()
    {
        return $this->_tokenStorage;
    }

    /**
     * Get entity manager
     *
     * @return EntityManagerInterface service
     */
    public function getEntityManager()
    {
        return $this->_entityManager;
    }

    /**
     * @param AddToUserListEvent $event
     * @throws DrugIsNotSetException
     * @throws UserIsNotSetException
     */
    public function onAddDrugToUserListEvent(AddToUserListEvent $event)
    {
        $user = $event->getUser();
        if (!$user)
            throw new UserIsNotSetException();

        $drug = $event->getDrug();
        if (!$drug)
            throw new DrugIsNotSetException();

        $em = $this->getEntityManager();
        $reminders = $em->getRepository('AppBundle:Reminder')->findBy(['drug' => $drug, 'user' => $user]);

        if (count($reminders) == 0) {

            $reminder = new Reminder();
            $reminder->setDrug($drug);
            $reminder->setUser($user);

            $em->persist($reminder);
            $em->flush();
        }
    }

    /**
     * @param RemoveFromUserListEvent $event
     * @throws DrugIsNotSetException
     * @throws UserIsNotSetException
     */
    public function onRemoveDrugFromUserListEvent(RemoveFromUserListEvent $event)
    {
        $user = $event->getUser();
        if (!$user)
            throw new UserIsNotSetException();

        $drug = $event->getDrug();
        if (!$drug)
            throw new DrugIsNotSetException();

        $em = $this->getEntityManager();
        $reminders = $em->getRepository('AppBundle:Reminder')->findBy(['drug' => $drug, 'user' => $user]);

        if (count($reminders) > 0) {

            foreach ($reminders as $reminder) {

                $em->remove($reminder);
                $em->flush();
            }
        }
    }
}