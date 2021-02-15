<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 *  @ApiResource
 */
class Customer implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("customers")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("customers")
     * @Assert\NotBlank(message="Le nom est obligatoire")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("customers")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("customers")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("customers")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     *   @Groups("customers")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=6)
     *   @Groups("customers")
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=255)
     *   @Groups("customers")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *   @Groups("customers")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *   @Groups("customers")
     */
    private $photo;

    /**
     * @ORM\Column(type="boolean")
     *   @Groups("customers")
     */
    private $newsletter;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="customer", orphanRemoval=true)
     *  @Groups("customers")
     */
    private $bookings;


    /**
     * @ORM\OneToMany(targetEntity=CustomerComment::class, mappedBy="customer", orphanRemoval=true)
     * @Groups("customers")
     */
    private $customer_comment;

    /**
     * @ORM\OneToMany(targetEntity=CustomerNotation::class, mappedBy="customer", orphanRemoval=true)
     *  @Groups("customers")
     */
    private $customerNotations;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->customer_comment = new ArrayCollection();
        $this->customerNotations = new ArrayCollection();
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

    public function getFullname(): ?string
    {
        return $this->firstname ." ". $this->lastname;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalCode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setCustomer($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getCustomer() === $this) {
                $booking->setCustomer(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|CustomerComment[]
     */
    public function getCustomerComment(): Collection
    {
        return $this->customer_comment;
    }

    public function addCustomerComment(CustomerComment $customerComment): self
    {
        if (!$this->customer_comment->contains($customerComment)) {
            $this->customer_comment[] = $customerComment;
            $customerComment->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerComment(CustomerComment $customerComment): self
    {
        if ($this->customer_comment->removeElement($customerComment)) {
            // set the owning side to null (unless already changed)
            if ($customerComment->getCustomer() === $this) {
                $customerComment->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerNotation[]
     */
    public function getCustomerNotations(): Collection
    {
        return $this->customerNotations;
    }

    public function addCustomerNotation(CustomerNotation $customerNotation): self
    {
        if (!$this->customerNotations->contains($customerNotation)) {
            $this->customerNotations[] = $customerNotation;
            $customerNotation->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerNotation(CustomerNotation $customerNotation): self
    {
        if ($this->customerNotations->removeElement($customerNotation)) {
            // set the owning side to null (unless already changed)
            if ($customerNotation->getCustomer() === $this) {
                $customerNotation->setCustomer(null);
            }
        }

        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
    }

    public function getUsername()
    {
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function __toString()
    {
        return $this->getFullname();
    }
}