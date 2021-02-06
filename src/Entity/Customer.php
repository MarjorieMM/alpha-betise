<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer implements UserInterface
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
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="customer")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity=CustomerComment::class, mappedBy="customer")
     */
    private $customerComments;

    /**
     * @ORM\OneToMany(targetEntity=CustomerOrder::class, mappedBy="customer")
     */
    private $customerOrders;

    /**
     * @ORM\OneToMany(targetEntity=CustomerNotation::class, mappedBy="customer")
     */
    private $customerNotations;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="customer_booking")
     */
    private $booking;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->customerComments = new ArrayCollection();
        $this->customerOrders = new ArrayCollection();
        $this->customerNotations = new ArrayCollection();
        $this->booking = new ArrayCollection();
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
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
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
    public function getCustomerComments(): Collection
    {
        return $this->customerComments;
    }

    public function addCustomerComment(CustomerComment $customerComment): self
    {
        if (!$this->customerComments->contains($customerComment)) {
            $this->customerComments[] = $customerComment;
            $customerComment->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerComment(CustomerComment $customerComment): self
    {
        if ($this->customerComments->removeElement($customerComment)) {
            // set the owning side to null (unless already changed)
            if ($customerComment->getCustomer() === $this) {
                $customerComment->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerOrder[]
     */
    public function getCustomerOrders(): Collection
    {
        return $this->customerOrders;
    }

    public function addCustomerOrder(CustomerOrder $customerOrder): self
    {
        if (!$this->customerOrders->contains($customerOrder)) {
            $this->customerOrders[] = $customerOrder;
            $customerOrder->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerOrder(CustomerOrder $customerOrder): self
    {
        if ($this->customerOrders->removeElement($customerOrder)) {
            // set the owning side to null (unless already changed)
            if ($customerOrder->getCustomer() === $this) {
                $customerOrder->setCustomer(null);
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

    /**
     * @return Collection|Booking[]
     */
    public function getBooking(): Collection
    {
        return $this->booking;
    }

    public function getSalt()
    {
        
    }
    public function getUsername()
    {
        
    }
    public function getRoles(){

    }

    public function eraseCredentials()
    {
        
    }
}