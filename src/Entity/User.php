<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=WorkCertificate::class, mappedBy="createdBy")
     */
    private $workCertificates;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\OneToMany(targetEntity=SalaryCertificate::class, mappedBy="createdBy")
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $workCertificate->setCreatedBy($this);
        }

        return $this;
    }

    public function removeWorkCertificate(WorkCertificate $workCertificate): self
    {
        if ($this->workCertificates->removeElement($workCertificate)) {
            // set the owning side to null (unless already changed)
            if ($workCertificate->getCreatedBy() === $this) {
                $workCertificate->setCreatedBy(null);
            }
        }

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

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
            $salaryCertificate->setCreatedBy($this);
        }

        return $this;
    }

    public function removeSalaryCertificate(SalaryCertificate $salaryCertificate): self
    {
        if ($this->salaryCertificates->removeElement($salaryCertificate)) {
            // set the owning side to null (unless already changed)
            if ($salaryCertificate->getCreatedBy() === $this) {
                $salaryCertificate->setCreatedBy(null);
            }
        }

        return $this;
    }
}
