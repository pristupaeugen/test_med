<?php

namespace AppBundle\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class EntityListener
 * @package AppBundle\EventListener
 */
class EntityListener
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
     * @return object service
     */
    public function getEntityManager()
    {
        return $this->_entityManager;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if(method_exists($entity, 'initMedicine')) {
            $entity->initMedicine();
        }

        if(method_exists($entity, 'defineMyPharmacist')) {
            $entity->defineMyPharmacist($this->getTokenStorage());
        }

        if(method_exists($entity, 'defineMyMatch')) {
            $entity->defineMyMatch($this->getTokenStorage());
        }

        if(method_exists($entity, 'defineMyInteractions')) {
            $entity->defineMyInteractions($this->getTokenStorage());
        }

        if(method_exists($entity, 'defineIngredients')) {
            $entity->defineIngredients($this->getEntityManager());
        }

        if(method_exists($entity, 'setStartDateTimestamp')) {
            $entity->setStartDateTimestamp($entity->getStartDate()->getTimestamp());
        }
    }
}