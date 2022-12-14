<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    //Restriction for status
    private const STATUS = ['Consulté', 'Entretien', 'Recrutement', 'Refus', 'Recruté'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Candidate::class, inversedBy: 'consultations')]
    private Candidate $candidate;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'consultations')]
    private User $user;

    #[Assert\Choice(choices: Consultation::STATUS, message: "Choisissez parmis ces status: 'Consulté', 'Entretien', 'Recrutement', 'Refus'")]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $status;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private \DateTime $createdAt;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $relanceDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(?Candidate $candidate): self
    {
        $this->candidate = $candidate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        if ($status === 'Recruté') {
            $this->candidate->setIsVisible(false);
        }
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRelanceDate(): ?\DateTime
    {
        return $this->relanceDate;
    }

    public function setRelanceDate(\DateTime $relanceDate): self
    {
        $this->relanceDate = $relanceDate;

        return $this;
    }
}
