<?php

namespace App\Domain\Credit\Exception;

class CreditTypeNotExist extends \Exception
{
    public function __construct(?string $message = null)
    {
        $this->message = $message;
    }
}