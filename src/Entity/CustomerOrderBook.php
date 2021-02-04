<?php

namespace App\Entity;

use App\Repository\CustomerOrderBookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerOrderBookRepository::class)
 */
class CustomerOrderBook
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerOrder::class, inversedBy="customerOrderBooks")
     */
    private $customer_order;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="customerOrderBooks")
     */
    private $book;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerOrder(): ?CustomerOrder
    {
        return $this->customer_order;
    }

    public function setCustomerOrder(?CustomerOrder $customer_order): self
    {
        $this->customer_order = $customer_order;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
