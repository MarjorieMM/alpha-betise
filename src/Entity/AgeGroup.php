<?php

namespace App\Entity;

use App\Repository\AgeGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgeGroupRepository::class)
 */
class AgeGroup
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
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $min_age;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_age;

    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="ageGroup", orphanRemoval=true)
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="ageGroup")
     */
    private $events;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getMinAge(): ?int
    {
        return $this->min_age;
    }

    public function setMinAge(int $min_age): self
    {
        $this->min_age = $min_age;

        return $this;
    }

    public function getMaxAge(): ?int
    {
        return $this->max_age;
    }

    public function setMaxAge(int $max_age): self
    {
        $this->max_age = $max_age;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setAgeGroup($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getAgeGroup() === $this) {
                $book->setAgeGroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setAgeGroup($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getAgeGroup() === $this) {
                $event->setAgeGroup(null);
            }
        }

        return $this;
    }
}
