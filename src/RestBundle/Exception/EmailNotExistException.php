<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class EmailNotExistException
 * @package RestBundle\Exception
 */
class EmailNotExistException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;
}