<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ParamIsNotValidException
 * @package RestBundle\Exception
 */
class ParamIsNotValidException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;
}