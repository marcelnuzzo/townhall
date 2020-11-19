<?php

namespace App\Entity;

use App\Repository\TownHallRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TownHallRepository::class)
 * @Vich\Uploadable
 */
class TownHall
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="text")
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $story;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="text")
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $postaladdress;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
	* @Assert\Email(
     *     message = "L'adresse email {{ value }} est invalide."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $nameMayor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoMayor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $townHallTeam;

     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="townHall", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    public function __construct()
    {
        $this->updateAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPostaladdress(): ?string
    {
        return $this->postaladdress;
    }

    public function setPostaladdress(string $postaladdress): self
    {
        $this->postaladdress = $postaladdress;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getNameMayor(): ?string
    {
        return $this->nameMayor;
    }

    public function setNameMayor(string $nameMayor): self
    {
        $this->nameMayor = $nameMayor;

        return $this;
    }

    public function getPhotoMayor(): ?string
    {
        return $this->photoMayor;
    }

    public function setPhotoMayor(string $photoMayor): self
    {
        $this->photoMayor = $photoMayor;

        return $this;
    }

    public function getTownHallTeam(): ?string
    {
        return $this->townHallTeam;
    }

    public function setTownHallTeam(?string $townHallTeam): self
    {
        $this->townHallTeam = $townHallTeam;

        return $this;
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
}
