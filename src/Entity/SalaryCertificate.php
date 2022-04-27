<?php

namespace App\Entity;

use App\Repository\SalaryCertificateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryCertificateRepository::class)
 */
class SalaryCertificate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $P1;

    /**
     * @ORM\Column(type="float")
     */
    private $p2;

    /**
     * @ORM\Column(type="float")
     */
    private $p3;

    /**
     * @ORM\Column(type="float")
     */
    private $p4;

    /**
     * @ORM\Column(type="float")
     */
    private $p5;

    /**
     * @ORM\Column(type="float")
     */
    private $p6;

    /**
     * @ORM\Column(type="float")
     */
    private $p7;

    /**
     * @ORM\Column(type="float")
     */
    private $p8;

    /**
     * @ORM\Column(type="float")
     */
    private $p9;

    /**
     * @ORM\Column(type="float")
     */
    private $p10;

    /**
     * @ORM\Column(type="float")
     */
    private $p11;

    /**
     * @ORM\Column(type="float")
     */
    private $p12;

    /**
     * @ORM\Column(type="float")
     */
    private $p13;

    /**
     * @ORM\Column(type="float")
     */
    private $p14;

    /**
     * @ORM\Column(type="float")
     */
    private $p15;

    /**
     * @ORM\Column(type="float")
     */
    private $p16;

    /**
     * @ORM\Column(type="float")
     */
    private $p17;

    /**
     * @ORM\Column(type="float")
     */
    private $p18;

    /**
     * @ORM\Column(type="float")
     */
    private $p19;

    /**
     * @ORM\Column(type="float")
     */
    private $p20;

    /**
     * @ORM\ManyToOne(targetEntity=Worker::class, inversedBy="salaryCertificates")
     */
    private $worker;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="salaryCertificates")
     */
    private $createdBy;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getP1(): ?float
    {
        return $this->P1;
    }

    public function setP1(float $P1): self
    {
        $this->P1 = $P1;

        return $this;
    }

    public function getP2(): ?float
    {
        return $this->p2;
    }

    public function setP2(float $p2): self
    {
        $this->p2 = $p2;

        return $this;
    }

    public function getP3(): ?float
    {
        return $this->p3;
    }

    public function setP3(float $p3): self
    {
        $this->p3 = $p3;

        return $this;
    }

    public function getP4(): ?float
    {
        return $this->p4;
    }

    public function setP4(float $p4): self
    {
        $this->p4 = $p4;

        return $this;
    }

    public function getP5(): ?float
    {
        return $this->p5;
    }

    public function setP5(float $p5): self
    {
        $this->p5 = $p5;

        return $this;
    }

    public function getP6(): ?float
    {
        return $this->p6;
    }

    public function setP6(float $p6): self
    {
        $this->p6 = $p6;

        return $this;
    }

    public function getP7(): ?float
    {
        return $this->p7;
    }

    public function setP7(float $p7): self
    {
        $this->p7 = $p7;

        return $this;
    }

    public function getP8(): ?float
    {
        return $this->p8;
    }

    public function setP8(float $p8): self
    {
        $this->p8 = $p8;

        return $this;
    }

    public function getP9(): ?float
    {
        return $this->p9;
    }

    public function setP9(float $p9): self
    {
        $this->p9 = $p9;

        return $this;
    }

    public function getP10(): ?float
    {
        return $this->p10;
    }

    public function setP10(float $p10): self
    {
        $this->p10 = $p10;

        return $this;
    }

    public function getP11(): ?float
    {
        return $this->p11;
    }

    public function setP11(float $p11): self
    {
        $this->p11 = $p11;

        return $this;
    }

    public function getP12(): ?float
    {
        return $this->p12;
    }

    public function setP12(float $p12): self
    {
        $this->p12 = $p12;

        return $this;
    }

    public function getP13(): ?float
    {
        return $this->p13;
    }

    public function setP13(float $p13): self
    {
        $this->p13 = $p13;

        return $this;
    }

    public function getP14(): ?float
    {
        return $this->p14;
    }

    public function setP14(float $p14): self
    {
        $this->p14 = $p14;

        return $this;
    }

    public function getP15(): ?float
    {
        return $this->p15;
    }

    public function setP15(float $p15): self
    {
        $this->p15 = $p15;

        return $this;
    }

    public function getP16(): ?float
    {
        return $this->p16;
    }

    public function setP16(float $p16): self
    {
        $this->p16 = $p16;

        return $this;
    }

    public function getP17(): ?float
    {
        return $this->p17;
    }

    public function setP17(float $p17): self
    {
        $this->p17 = $p17;

        return $this;
    }

    public function getP18(): ?float
    {
        return $this->p18;
    }

    public function setP18(float $p18): self
    {
        $this->p18 = $p18;

        return $this;
    }

    public function getP19(): ?float
    {
        return $this->p19;
    }

    public function setP19(float $p19): self
    {
        $this->p19 = $p19;

        return $this;
    }

    public function getP20(): ?float
    {
        return $this->p20;
    }

    public function setP20(float $p20): self
    {
        $this->p20 = $p20;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    

}
