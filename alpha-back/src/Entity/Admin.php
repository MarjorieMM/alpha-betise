<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 *  @ApiResource
 */
class Admin
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
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=AdminComment::class, mappedBy="admin", orphanRemoval=true)
     */
    private $admincomments;

    public function __construct()
    {
        $this->admincomments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Admincomment[]
     */
    public function getAdmincomments(): Collection
    {
        return $this->admincomments;
    }

    public function addAdmincomment(Admincomment $admincomment): self
    {
        if (!$this->admincomments->contains($admincomment)) {
            $this->admincomments[] = $admincomment;
            $admincomment->setAdmin($this);
        }

        return $this;
    }

    public function removeAdmincomment(Admincomment $admincomment): self
    {
        if ($this->admincomments->removeElement($admincomment)) {
            // set the owning side to null (unless already changed)
            if ($admincomment->getAdmin() === $this) {
                $admincomment->setAdmin(null);
            }
        }

        return $this;
    }
}