<?php

namespace App\Entity;

use App\Repository\WorkCertificateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkCertificateRepository::class)
 */
class WorkCertificate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Worker::class, inversedBy="workCertificates")
     */
    private $worker;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="workCertificates")
     */
    private $createdBy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $signer;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $lang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getWorker(): ?Worker
    {
        return $this->worker;
    }

    public function setWorker(?Worker $worker): self
    {
        $this->worker = $worker;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getChef(): ?string
    {
        return $this->chef;
    }

    public function setChef(string $chef): self
    {
        $this->chef = $chef;

        return $this;
    }

    public function getSigner(): ?string
    {
        return $this->signer;
    }

    public function setSigner(string $signer): self
    {
        $this->signer = $signer;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }
}
