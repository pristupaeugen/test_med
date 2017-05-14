<?php

namespace RestBundle\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class MedicineNotExistException
 * @package RestBundle\Exception
 */
class MedicineNotExistException extends RestException
{
    /**
     * @var int
     */
    protected $code = Response::HTTP_NOT_FOUND;
}