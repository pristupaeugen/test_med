<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class FormException
 * @package RestBundle\Exception
 */
class FormException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_BAD_REQUEST;
}