<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Candidate::class, inversedBy: 'consultations')]
    private Candidate $candidat;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'consultations')]
    private User $user;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $status;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private \DateTime $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTime $relanceDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidat(): ?Candidate
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidate $candidat): self
    {
        $this->candidat = $candidat;

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
