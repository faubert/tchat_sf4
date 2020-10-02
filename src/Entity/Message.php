<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
    private $content;
/*
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     */
//    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

    /**
     * @var Connexion $connexion
     * @ORM\ManyToOne(targetEntity="Connexion", inversedBy="messages")
     */
    private $connexion;

    public function getId(): ?int
    {
        return $this->id;
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

  /*  public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }
*/
    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * @return Connexion
     */
    public function getConnexion(): Connexion
    {
        return $this->connexion;
    }

    /**
     * @param Connexion $connexion
     */
    public function setConnexion(Connexion $connexion): void
    {
        $this->connexion = $connexion;
    }
}
