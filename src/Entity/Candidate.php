<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Date;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
#[Vich\Uploadable]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'candidates')]
    private ?User $user;

    #[Vich\UploadableField(mapping: 'candidate_cv', fileNameProperty: 'cvName')]
    private ?File $cvFile = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $cvSize;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $cvName = null;

    #[ORM\Column(type:'datetime', nullable: true)]
    private ?\DateTimeInterface $uploadAt = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $city;

    #[ORM\Column(type: 'string', length: 2500, nullable: true)]
    private string $linkedin;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private bool $telework;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private bool $vehicle;

    #[ORM\Column(type: 'float', length: 255)]
    private float $salary;

    #[ORM\ManyToOne(targetEntity: Experience::class, inversedBy: 'candidates')]
    private ?Experience $experience;

    #[ORM\ManyToMany(targetEntity: Skill::class, inversedBy: 'candidates')]
    private Collection $skills;

    #[ORM\ManyToMany(targetEntity: Domain::class)]
    private ?Collection $domains;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?float $prime;

    #[ORM\Column(type: 'integer', nullable: true)]
    private int $prixFiche;

    #[ORM\ManyToOne(targetEntity: Disponibility::class, inversedBy: 'candidates')]
    private Disponibility $disponibilities;

    #[ORM\ManyToOne(targetEntity: BusinessRole::class, inversedBy: 'candidates')]
    private BusinessRole $businessRole;

    #[ORM\ManyToMany(targetEntity: Mobility::class, inversedBy: 'candidates')]
    private Collection $mobilities;

    #[ORM\Column(type: 'boolean')]
    private bool $validateSheet = false;

    #[ORM\Column(type: 'string', length: 2500, nullable: true)]
    private ?string $observation;

    #[ORM\Column(type: 'datetime')]
    private DateTime $createdAt;

    #[ORM\Column(type: 'boolean')]
    private bool $archived = false;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'candidates')]
    private Admin $validatedBy;

    #[ORM\Column(type: 'boolean')]
    private bool $isVisible = false;

    #[ORM\OneToMany(mappedBy: 'candidate', targetEntity: Consultation::class)]
    private Collection $consultations;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $gender;

    #[ORM\Column(type: 'datetime')]
    private DateTime $expirationDate;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->domains = new ArrayCollection();
        $this->mobilities = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->createdAt = new DateTime();
        $this->expirationDate = new DateTime('+5 month');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function isTelework(): ?bool
    {
        return $this->telework;
    }

    public function setTelework(?bool $telework): self
    {
        $this->telework = $telework;

        return $this;
    }

    public function isVehicle(): ?bool
    {
        return $this->vehicle;
    }

    public function setVehicle(?bool $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(?bool $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }
    public function setExperience(?Experience $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getPrime(): ?float
    {
        return $this->prime;
    }

    //Prime = 20% du prix de la fiche candidat
    public function setPrime(?float $prixFiche): self
    {
        $this->prime = $prixFiche * 0.2;

        return $this;
    }

    public function getDisponibilities(): ?Disponibility
    {
        return $this->disponibilities;
    }

    public function setDisponibilities(?Disponibility $disponibilities): self
    {
        $this->disponibilities = $disponibilities;

        return $this;
    }

    public function getBusinessRole(): ?BusinessRole
    {
        return $this->businessRole;
    }

    public function setBusinessRole(?BusinessRole $businessRole): self
    {
        $this->businessRole = $businessRole;

        return $this;
    }

    /**
     * @return Collection<int, Mobility>
     */
    public function getMobilities(): Collection
    {
        return $this->mobilities;
    }

    public function addMobilities(Mobility $mobilities): self
    {
        if (!$this->mobilities->contains($mobilities)) {
            $this->mobilities[] = $mobilities;
        }

        return $this;
    }

    public function removeMobilities(Mobility $mobilities): self
    {
        $this->mobilities->removeElement($mobilities);

        return $this;
    }

    public function isValidateSheet(): ?bool
    {
        return $this->validateSheet;
    }

    public function setValidateSheet(bool $validateSheet): self
    {
        $this->validateSheet = $validateSheet;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getValidatedBy(): ?Admin
    {
        return $this->validatedBy;
    }

    public function setValidatedBy(?Admin $admin): self
    {
        $this->validatedBy = $admin;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setCandidate($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getCandidate() === $this) {
                $consultation->setCandidate(null);
            }
        }
        return $this;
    }

    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }
    public function setExpirationDate(DateTime $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkills(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkills(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }

    public function getDomains(): Collection
    {
        return $this->domains;
    }

    public function addDomains(Domain $domain): self
    {
        if (!$this->domains->contains($domain)) {
            $this->domains[] = $domain;
        }

        return $this;
    }

    public function removeDomains(Domain $domain): self
    {
        $this->domains->removeElement($domain);

        return $this;
    }

    public function setCvFile(?File $cvFile): void
    {
        $this->cvFile = $cvFile;

        if (null !== $cvFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->uploadAt = new DateTime('now');
        }
    }

    public function getUploadAt(): ?\DateTimeInterface
    {
        return $this->uploadAt;
    }

    public function getCvFile(): ?File
    {
        return $this->cvFile;
    }

    public function setCvName(?string $cvName): void
    {
        $this->cvName = $cvName;
    }

    public function getCvName(): ?string
    {
        return $this->cvName;
    }

    public function setCvSize(?int $cvSize): void
    {
        $this->cvSize = $cvSize;
    }

    public function getCvSize(): ?int
    {
        return $this->cvSize;
    }

    public function getPrixFiche(): ?int
    {
        return $this->prixFiche;
    }

    public function setPrixFiche(?int $prixFiche): void
    {
        $this->prixFiche = $prixFiche;
    }

    public function getConsultationsByStatus(string $status): Collection
    {
        return $this->consultations->filter(function (Consultation $consultation) use ($status): bool {
            return $consultation->getStatus() === $status;
        });
    }

    public function hasBeen(string $status): bool
    {
        return count($this->getConsultationsByStatus($status)) !== 0;
    }
}
