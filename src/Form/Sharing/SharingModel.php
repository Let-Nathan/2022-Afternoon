<?php

namespace App\Form\Sharing;

class SharingModel
{
    private string|null $buyer = null;
    private string|null $seller = null;
    private string|null $candidateName = null;
    private string|null $dateCreation = null;
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
    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }
    public function setDateCreation(?string $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
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
