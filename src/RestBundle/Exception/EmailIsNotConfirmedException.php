<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class EmailIsNotConfirmedException
 * @package RestBundle\Exception
 */
class EmailIsNotConfirmedException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_BAD_REQUEST;
}