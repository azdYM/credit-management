<?php

namespace App\Domain\Credit\Event;

use App\Domain\Credit\CreditInterface;
use App\Domain\Employee\Entity\Employee;
use App\Domain\Mounting\Entity\CreditAgent;

class CreditApprovedEvent
{
    public function __construct(
        private CreditInterface $credit
    ){}

    public function getCredit(): CreditInterface
    {
        return $this->credit;
    }

    public function getCreditAgent(): Employee
    {
        return $this->credit
            ->getCreditAgent()
        ;
    }
}