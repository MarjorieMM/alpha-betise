<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderBookRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=OrderBookRepository::class)
 *  @ApiResource
 */
class OrderBook
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="orderbooks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderid;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="orderbooks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getOrderid(): ?Order
    {
        return $this->orderid;
    }

    public function setOrderid(?Order $orderid): self
    {
        $this->orderid = $orderid;

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
}