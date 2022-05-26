<?php


namespace App\Services\Exceptions;


class PracticeAllowanceException extends \Exception
{

    /**
     * NotFoundException constructor.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
