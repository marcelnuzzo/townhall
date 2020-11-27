<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Assert\Choice(
	 {"alert-info", "event", "annonce"},
	 message = "Le choix {{ value }} est invalide."
	 )
	*/
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summar;

    /**
     * @ORM\Column(type="text")
	 * @Assert\NotBlank(message="Erreur. Ce champ est obligatoire.") 
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedat;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPublishedat(): ?\DateTimeInterface
    {
        return $this->publishedat;
    }

    public function setPublishedat(\DateTimeInterface $publishedat): self
    {
        $this->publishedat = $publishedat;

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
