<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApplicationKeyNotExistException
 * @package RestBundle\Exception
 */
class ApplicationKeyNotExistException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_PRECONDITION_FAILED;
}