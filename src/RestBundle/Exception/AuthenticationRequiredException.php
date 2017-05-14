<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthenticationRequiredException
 * @package RestBundle\Exception
 */
class AuthenticationRequiredException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_UNAUTHORIZED;
}