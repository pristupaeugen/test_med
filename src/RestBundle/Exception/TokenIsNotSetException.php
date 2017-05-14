<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class TokenIsNotSetException
 * @package RestBundle\Exception
 */
class TokenIsNotSetException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_UNAUTHORIZED;
}