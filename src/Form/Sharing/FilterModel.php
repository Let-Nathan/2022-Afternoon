<?php

namespace App\Form\Sharing;

class FilterModel
{
    private string|null $buyer = null;
    private string|null $seller = null;
    private string|null $candidateName = null;
    private \DateTime|null $creationDate = null;
    private \DateTime|null $dateRelance = null;
    private string|null $sharingState = null;
    private \DateTime|null $endDate = null;

    public function getBuyer(): ?string
    {
        return $this->buyer;
    }

    public function setBuyer(?string $buyer): void
    {
        $this->buyer = $buyer;
    }

    public function getSeller(): ?string
    {
        return $this->seller;
    }

    public function setSeller(?string $seller): void
    {
        $this->seller = $seller;
    }

    public function getCandidateName(): ?string
    {
        return $this->candidateName;
    }
    public function setCandidateName(?string $candidateName): void
    {
        $this->candidateName = $candidateName;
    }
    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }
    public function setCreationDate(?\DateTime $dateCreation): void
    {
        $this->creationDate = $dateCreation;
    }
    public function getDateRelance(): ?\DateTime
    {
        return $this->dateRelance;
    }
    public function setDateRelance(?\DateTime $dateRelance): void
    {
        $this->dateRelance = $dateRelance;
    }
    public function getSharingState(): ?string
    {
        return $this->sharingState;
    }
    public function setSharingState(?string $sharingState): void
    {
        $this->sharingState = $sharingState;
    }
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }
    public function setEndDate(?\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }
}
