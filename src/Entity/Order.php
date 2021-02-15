<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 *  @ApiResource
 */
class Order
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
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity=OrderBook::class, mappedBy="orderid", orphanRemoval=true)
     */
    private $orderbooks;

    public function __construct()
    {
        $this->orderbooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Orderbook[]
     */
    public function getOrderbooks(): Collection
    {
        return $this->orderbooks;
    }

    public function addOrderbook(Orderbook $orderbook): self
    {
        if (!$this->orderbooks->contains($orderbook)) {
            $this->orderbooks[] = $orderbook;
            $orderbook->setOrderid($this);
        }

        return $this;
    }

    public function removeOrderbook(Orderbook $orderbook): self
    {
        if ($this->orderbooks->removeElement($orderbook)) {
            // set the owning side to null (unless already changed)
            if ($orderbook->getOrderid() === $this) {
                $orderbook->setOrderid(null);
            }
        }

        return $this;
    }

}