<?php

namespace App\Entity;

use App\Repository\PrimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrimeRepository::class)]
class Prime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $prime;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $afternoonPrime;

    #[ORM\OneToMany(mappedBy: 'prime', targetEntity: Candidate::class)]
    private ArrayCollection $candidates;

    #[ORM\OneToOne(mappedBy: 'prime', targetEntity: Consultation::class, cascade: ['persist', 'remove'])]
    private Consultation $consultation;

    public function __construct()
    {
        $this->candidates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrime(): ?string
    {
        return $this->prime;
    }

    public function setPrime(?string $prime): self
    {
        $this->prime = $prime;

        return $this;
    }

    public function getAfternoonPrime(): ?string
    {
        return $this->afternoonPrime;
    }

    public function setAfternoonPrime(?string $afternoonPrime): self
    {
        $this->afternoonPrime = $afternoonPrime;

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
            $candidate->setPrime($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): self
    {
        if ($this->candidates->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getPrime() === $this) {
                $candidate->setPrime(null);
            }
        }

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }
    public function setConsultation(Consultation $consultation): self
    {
        $this->consultation = $consultation;
        return $this;
    }
}
