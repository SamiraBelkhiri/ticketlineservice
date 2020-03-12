<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ticketTitle;

    /**
     * @ORM\Column(type="date")
     */
    private $openTime;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $closeTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $priority;
    //'high' , 'low' , 'medium'

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $assignTo;

    /**
     * @ORM\Column(type="integer")
     */
    private $reOpen;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ticketStatus ;

    /**
     * @ORM\Column(type="datetime")
     */
    private $openTimee;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $closeTimee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="tickets")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="comment")
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }
    //'open','close','inProgress','waitingForFeedBack','wontFix' , 'pool'

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicketTitle(): ?string
    {
        return $this->ticketTitle;
    }

    public function setTicketTitle(string $ticketTitle): self
    {
        $this->ticketTitle = $ticketTitle;

        return $this;
    }

    public function getOpenTime(): ?\DateTimeInterface
    {
        return $this->openTime;
    }
// $test->setOpenTime(new \DateTime(H:i:s))
    public function setOpenTime(\DateTimeInterface $openTime): self
    {
        $this->openTime = $openTime;

        return $this;
    }

    public function getCloseTime(): ?\DateTimeInterface
    {
        return $this->closeTime;
    }

    public function setCloseTime(?\DateTimeInterface $closeTime): self
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getAssignTo(): ?int
    {
        return $this->assignTo;
    }

    public function setAssignTo(?int $assignTo): self
    {
        $this->assignTo = $assignTo;

        return $this;
    }

    public function getReOpen(): ?int
    {
        return $this->reOpen;
    }

    public function setReOpen(int $reOpen): self
    {
        $this->reOpen = $reOpen;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getTicketStatus(): ?string
    {
        return $this->ticketStatus;
    }

    public function setTicketStatus(string $ticketStatus): self
    {
        $this->ticketStatus = $ticketStatus;

        return $this;
    }

    public function getOpenTimee(): ?\DateTimeInterface
    {
        return $this->openTimee;
    }

    public function setOpenTimee(\DateTimeInterface $openTimee): self
    {
        $this->openTimee = $openTimee;

        return $this;
    }

    public function getCloseTimee(): ?\DateTimeInterface
    {
        return $this->closeTimee;
    }

    public function setCloseTimee(?\DateTimeInterface $closeTimee): self
    {
        $this->closeTimee = $closeTimee;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setComment($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getComment() === $this) {
                $comment->setComment(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
