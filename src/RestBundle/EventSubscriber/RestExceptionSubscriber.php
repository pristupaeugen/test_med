<?php

namespace RestBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\JsonResponse;

use RestBundle\Exception\RestException;

/**
 * Class RestExceptionSubscriber
 * @package RestBundle\EventSubscriber
 */
class RestExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @param GetResponseForExceptionEvent $event
     * @return JsonResponse|void
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $e = $event->getException();
        if (!$e instanceof RestException) {
            return;
        }

        $response = new JsonResponse(
            [
                'code'    => $e->getCode(),
                'message' => $e->getMessage()
            ],
            $e->getCode()
        );

        $event->setResponse($response);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => 'onKernelException'
        );
    }
}