<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApplicationKeyIsNotSetException
 * @package RestBundle\Exception
 */
class ApplicationKeyIsNotSetException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_PRECONDITION_FAILED;
}