<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StructureRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StructureRepository::class)
 * @Vich\Uploadable
 */
class Structure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $organization_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * @Assert\Choice(
	 *{"Ecole maternelle", "Ecole primaire", "Collège", "Lycée"},
	 *message = "Le choix {{ value }} est invalide."
	 *)
     */
    private $school_type;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $name;

   /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="structure", fileNameProperty="logoName")
     * 
     * @var File|null
     */
    private $logoFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    private $logoName;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     */
    private $updateAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summar;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postaladdress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * @Assert\Email(
     *     message = "L'adresse email {{ value }} est invalide."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * @Assert\Url(
     *     message = "L’adresse URL {{ value }} est invalide."
     * )
     */
    private $website;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="structures")
     */
    private $user;

    public function __construct()
    {
        $this->updateAt = new \DateTime();
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganizationType(): ?string
    {
        return $this->organization_type;
    }

    public function setOrganizationType(string $organization_type): self
    {
        $this->organization_type = $organization_type;

        return $this;
    }

    public function getSchoolType(): ?string
    {
        return $this->school_type;
    }

    public function setSchoolType(?string $school_type): self
    {
        $this->school_type = $school_type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $logoFile
     */
    public function setLogoFile(?File $logoFile = null): void
    {
        $this->logoFile = $logoFile;

        if (null !== $logoFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getLogoFile(): ?File
    {
        return $this->logoFile;
    }

    public function setLogoName(?string $logoName): void
    {
        $this->logoName = $logoName;
    }

    public function getLogoName(): ?string
    {
        return $this->logoName;
    }

    public function getSummar(): ?string
    {
        return $this->summar;
    }

    public function setSummar(?string $summar): self
    {
        $this->summar = $summar;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPostaladdress(): ?string
    {
        return $this->postaladdress;
    }

    public function setPostaladdress(?string $postaladdress): self
    {
        $this->postaladdress = $postaladdress;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
