<?php

namespace App\Entity;

use App\Repository\ConnexionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConnexionRepository::class)
 */
class Connexion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="connexions")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_con;

    /**
     * @var ArrayCollection $messages
     * @ORM\OneToMany(targetEntity="Message", mappedBy="connexion", cascade={"persist", "remove"})
     */
    private $messages;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateCon(): ?\DateTimeInterface
    {
        return $this->date_con;
    }

    public function setDateCon(\DateTimeInterface $date_con): self
    {
        $this->date_con = $date_con;

        return $this;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function addMessage(Message $message)
    {
        $this->messages->add($message);
        $message->setConnexion($this);
    }
}
