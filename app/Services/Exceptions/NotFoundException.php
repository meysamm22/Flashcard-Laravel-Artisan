<?php


namespace App\Services\Exceptions;


class NotFoundException extends \Exception
{

    /**
     * NotFoundException constructor.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
