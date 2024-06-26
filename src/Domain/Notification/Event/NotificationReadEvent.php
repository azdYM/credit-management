<?php

namespace App\Domain\Notification\Event;

use App\Domain\Employee\Entity\Employee;

class NotificationReadEvent 
{
    public function __construct(private readonly Employee $employee)
    {}

    public function getEmployee(): Employee
    {
        return $this->employee;
    }
}