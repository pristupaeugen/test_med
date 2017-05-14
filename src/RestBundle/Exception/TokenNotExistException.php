<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class TokenNotExistException
 * @package RestBundle\Exception
 */
class TokenNotExistException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;
}