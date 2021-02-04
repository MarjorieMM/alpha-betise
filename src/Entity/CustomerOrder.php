<?php

namespace App\Entity;

use App\Repository\CustomerOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerOrderRepository::class)
 */
class CustomerOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="customerOrders")
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity=CustomerOrderBook::class, mappedBy="customer_order")
     */
    private $customerOrderBooks;

    public function __construct()
    {
        $this->customerOrderBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|CustomerOrderBook[]
     */
    public function getCustomerOrderBooks(): Collection
    {
        return $this->customerOrderBooks;
    }

    public function addCustomerOrderBook(CustomerOrderBook $customerOrderBook): self
    {
        if (!$this->customerOrderBooks->contains($customerOrderBook)) {
            $this->customerOrderBooks[] = $customerOrderBook;
            $customerOrderBook->setCustomerOrder($this);
        }

        return $this;
    }

    public function removeCustomerOrderBook(CustomerOrderBook $customerOrderBook): self
    {
        if ($this->customerOrderBooks->removeElement($customerOrderBook)) {
            // set the owning side to null (unless already changed)
            if ($customerOrderBook->getCustomerOrder() === $this) {
                $customerOrderBook->setCustomerOrder(null);
            }
        }

        return $this;
    }
}
