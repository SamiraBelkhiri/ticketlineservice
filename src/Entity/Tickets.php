<?php

namespace App\Entity;

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
}
