<?php

namespace App\Domain\Customer\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Customer\ClientInterface;
use App\Domain\Application\Entity\Portfolio;
use App\Domain\Application\PortfolioInterface;

#[ORM\MappedSuperclass]
abstract class Client extends Person implements ClientInterface
{
    #[ORM\Column(type: 'integer', unique: true)]
    protected ?int $folio = null;

    #[ORM\Column(type: 'datetime', name: 'membership_at', nullable: true)]
    protected ?DateTimeInterface $membershipAt = null;

    #[ORM\OneToOne(targetEntity: Portfolio::class, mappedBy: 'client', cascade: ['persist'])]
    protected ?PortfolioInterface $portfolio = null;
    
    abstract public function getFolio(): ?int;

    public function setFolio(int $folio): self
    {
        $this->folio = $folio;
        return $this;
    }

    public function getMembershipAt(): ?\DateTimeInterface
    {
        return $this->membershipAt;
    }

    public function setMembershipAt(\DateTimeInterface $membershipAt): self
    {
        $this->membershipAt = $membershipAt;
        return $this;
    }

    public function getPortfolio(): ?Portfolio
    {
        if ($this->portfolio === null) {
            $this->makePortfolio();
        }

        return $this->portfolio;
    }

    private function makePortfolio(): void
    {
        $this->portfolio = (new Portfolio)
            ->setClient($this)
        ;
    }
}