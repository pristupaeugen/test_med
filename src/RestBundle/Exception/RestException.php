<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class RestException
 * @package RestBundle\Exception
 */
class RestException extends HttpException
{
    /**
     * RestException constructor.
     * @param string $message
     * @param null $code
     */
    public function __construct($message, $code = null)
    {
        parent::__construct($this->getCode(), $message);
    }
}