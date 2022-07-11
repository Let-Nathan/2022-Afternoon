<?php

namespace App\Entity;

use App\Repository\BusinessRoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusinessRoleRepository::class)]
class BusinessRole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $businessRoleName;

    #[ORM\OneToMany(mappedBy: 'businessRole', targetEntity: Candidate::class)]
    private Collection $candidates;

    public function __construct()
    {
        $this->candidates = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBusinessRoleName(): ?string
    {
        return $this->businessRoleName;
    }

    public function setBusinessRoleName(string $businessRoleName): self
    {
        $this->businessRoleName = $businessRoleName;

        return $this;
    }

    /**
     * @return Collection<int, Candidate>
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): self
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates[] = $candidate;
            $candidate->setBusinessRole($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): self
    {
        if ($this->candidates->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getBusinessRole() === $this) {
                $candidate->setBusinessRole(null);
            }
        }

        return $this;
    }
}
