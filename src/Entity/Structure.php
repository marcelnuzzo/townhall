<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StructureRepository::class)
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
	 {"École maternelle", "École primaire", "Collège", "Lycée"},
	 message = "Le choix {{ value }} est invalide."
	 )
     */
    private $school_type;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

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
     * @ORM\Column(type="string", length=255)
     */
    private $createdat;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="structures")
     */
    private $user;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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

    public function getCreatedat(): ?string
    {
        return $this->createdat;
    }

    public function setCreatedat(string $createdat): self
    {
        $this->createdat = $createdat;

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
