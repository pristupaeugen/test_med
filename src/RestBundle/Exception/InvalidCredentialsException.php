<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidCredentialsException
 * @package RestBundle\Exception
 */
class InvalidCredentialsException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_BAD_REQUEST;
}