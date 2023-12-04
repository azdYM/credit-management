<?php

namespace App\Domain\Credit\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Credit\CreditInterface;
use App\Domain\Contract\Entity\Contract;
use App\Domain\Employee\Entity\Employee;
use App\Domain\Contract\ContractInterface;
use Doctrine\Common\Collections\Collection;
use App\Domain\Mounting\ActionOnCreditTrait;
use App\Domain\Mounting\Entity\ApprovalTrait;
use App\Domain\Mounting\Entity\RejectionTrait;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Application\Entity\TimestampTrait;
use App\Domain\Credit\Entity\ShortTerm\GageCredit;
use App\Domain\Garantee\Entity\GaranteeAttestation;
use App\Domain\Application\Entity\IdentifiableTrait;

#[ORM\Entity]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap([
    'generic' => Credit::class,
    'gage' => GageCredit::class,
    // Ajout d'une nouvelle credit
])]
abstract class Credit implements CreditInterface
{
    use IdentifiableTrait;
    use ApprovalTrait;
    use RejectionTrait;
    use ActionOnCreditTrait;
    use TimestampTrait;

    #[ORM\OneToOne(targetEntity: GaranteeAttestation::class)]
    #[ORM\JoinColumn(name: 'attestation_id', referencedColumnName: 'id')]
    protected ?GaranteeAttestation $attestation = null;

    #[ORM\ManyToOne(targetEntity: Employee::class)]
    #[ORM\JoinColumn(name: 'agent_id', referencedColumnName: 'id')]
    protected ?Employee $creditAgent = null;

    #[ORM\JoinTable(name: 'contracts_credits')]
    #[ORM\JoinColumn(name: 'credit_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'contract_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Contract::class)]
    protected Collection $contracts;

    public function __construct()
    {
        $this->approvals = new ArrayCollection();
        $this->rejections = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }    

    public function getCreditAgent(): Employee
    {
        return $this->creditAgent;
    }

    public function setCreditAgent(Employee $creditAgent): static
    {
        $this->creditAgent = $creditAgent;
        return $this;
    }

    public function getContracts(): Collection
    {
        return $this->contracts;
    }

    public function addContract(ContractInterface $contract): self
    {
        if (!$this->contracts->contains($contract)) {
            $this->contracts->add($contract);
        }

        return $this;
    }

    public function removeContract(ContractInterface $contract): self
    {
        if ($this->contracts->contains($contract)) {
            $this->contracts->removeElement($contract);
        }

        return $this;
    }

    public function getAttestation(): GaranteeAttestation
    {
        return $this->attestation;
    }

    public function setAttestation(GaranteeAttestation $attestation): static
    {
        $this->attestation = $attestation;
        return $this;
    }
}