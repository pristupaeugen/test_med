<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ParamNotExistException
 * @package RestBundle\Exception
 */
class ParamNotExistException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;
}