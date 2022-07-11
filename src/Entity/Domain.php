<?php

namespace App\Entity;

use App\Repository\DomainsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainsRepository::class)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $domaineName;

    public function __toString()
    {
        return $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomainesName(): ?string
    {
        return $this->domaineName;
    }

    public function setDomaineName(string $domaineName): self
    {
        $this->domaineName = $domaineName;

        return $this;
    }
}
