<?php

namespace App\Entity;

use App\Repository\WorkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkerRepository::class)
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $type = [];

    /**
     * @ORM\OneToMany(targetEntity=WorkCertificate::class, mappedBy="worker")
     */
    private $workCertificates;

    public function __construct()
    {
        $this->workCertificates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function setType(?array $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, WorkCertificate>
     */
    public function getWorkCertificates(): Collection
    {
        return $this->workCertificates;
    }

    public function addWorkCertificate(WorkCertificate $workCertificate): self
    {
        if (!$this->workCertificates->contains($workCertificate)) {
            $this->workCertificates[] = $workCertificate;
            $workCertificate->setWorker($this);
        }

        return $this;
    }

    public function removeWorkCertificate(WorkCertificate $workCertificate): self
    {
        if ($this->workCertificates->removeElement($workCertificate)) {
            // set the owning side to null (unless already changed)
            if ($workCertificate->getWorker() === $this) {
                $workCertificate->setWorker(null);
            }
        }

        return $this;
    }
}
