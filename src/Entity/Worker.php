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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=WorkCertificate::class, mappedBy="worker")
     */
    private $workCertificates;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $Genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    /**
     * @ORM\OneToMany(targetEntity=SalaryCertificate::class, mappedBy="worker")
     */
    private $salaryCertificates;



    public function __construct()
    {
        $this->workCertificates = new ArrayCollection();
        $this->salaryCertificates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
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


    // public function __toString()
    // {
    //     return $this->getId();
    // }   

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * @return Collection<int, SalaryCertificate>
     */
    public function getSalaryCertificates(): Collection
    {
        return $this->salaryCertificates;
    }

    public function addSalaryCertificate(SalaryCertificate $salaryCertificate): self
    {
        if (!$this->salaryCertificates->contains($salaryCertificate)) {
            $this->salaryCertificates[] = $salaryCertificate;
            $salaryCertificate->setWorker($this);
        }

        return $this;
    }

    public function removeSalaryCertificate(SalaryCertificate $salaryCertificate): self
    {
        if ($this->salaryCertificates->removeElement($salaryCertificate)) {
            // set the owning side to null (unless already changed)
            if ($salaryCertificate->getWorker() === $this) {
                $salaryCertificate->setWorker(null);
            }
        }

        return $this;
    }

}
