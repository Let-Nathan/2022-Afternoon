<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255)]
    private string $compagny;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $password;

    #[ORM\Column(type: 'string', unique: true)]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $roles;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: Candidate::class)]
    private Collection $candidates;

    public function __construct()
    {
        $this->candidates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCompagny(): ?string
    {
        return $this->compagny;
    }

    public function setCompagny(string $compagny): self
    {
        $this->compagny = $compagny;

        return $this;
    }

    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): self
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates[] = $candidate;
            $candidate->setValidatedBy($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): self
    {
        if ($this->candidates->removeElement($candidate)) {
            // set the owning side to null (unless already changed)
            if ($candidate->getValidatedBy() === $this) {
                $candidate->setValidatedBy(null);
            }
        }

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

    public function setRole(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function eraseCredentials(): array
    {
        return [];
    }
}
