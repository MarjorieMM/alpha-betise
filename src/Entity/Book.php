<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $extract;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publishing_house;

    /**
     * @ORM\Column(type="integer")
     */
    private $publication_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $collection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EAN_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ISBN_code;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_pages;

    /**
     * @ORM\Column(type="integer")
     */
    private $dimensions;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $original_language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $availability;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=AgeGroup::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $age_group;

    /**
     * @ORM\OneToMany(targetEntity=BookPhoto::class, mappedBy="book")
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=AdminComment::class, mappedBy="book")
     */
    private $adminComments;

    /**
     * @ORM\OneToOne(targetEntity=AdminComment::class, inversedBy="book_comment_admin", cascade={"persist", "remove"})
     */
    private $admin_comment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $admin_notation;

    /**
     * @ORM\OneToMany(targetEntity=CustomerComment::class, mappedBy="book")
     */
    private $customerComments;

    /**
     * @ORM\OneToMany(targetEntity=CustomerOrderBook::class, mappedBy="book")
     */
    private $customerOrderBooks;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class, mappedBy="book")
     */
    private $authors;

    /**
     * @ORM\OneToMany(targetEntity=CustomerNotation::class, mappedBy="book")
     */
    private $customerNotations;

    public function __construct()
    {
        $this->photo = new ArrayCollection();
        $this->adminComments = new ArrayCollection();
        $this->customerComments = new ArrayCollection();
        $this->customerOrderBooks = new ArrayCollection();
        $this->authors = new ArrayCollection();
        $this->customerNotations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExtract(): ?string
    {
        return $this->extract;
    }

    public function setExtract(?string $extract): self
    {
        $this->extract = $extract;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getPublishingHouse(): ?string
    {
        return $this->publishing_house;
    }

    public function setPublishingHouse(string $publishing_house): self
    {
        $this->publishing_house = $publishing_house;

        return $this;
    }

    public function getPublicationDate(): ?int
    {
        return $this->publication_date;
    }

    public function setPublicationDate(int $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getEANCode(): ?string
    {
        return $this->EAN_code;
    }

    public function setEANCode(string $EAN_code): self
    {
        $this->EAN_code = $EAN_code;

        return $this;
    }

    public function getISBNCode(): ?string
    {
        return $this->ISBN_code;
    }

    public function setISBNCode(string $ISBN_code): self
    {
        $this->ISBN_code = $ISBN_code;

        return $this;
    }

    public function getNumberPages(): ?int
    {
        return $this->number_pages;
    }

    public function setNumberPages(int $number_pages): self
    {
        $this->number_pages = $number_pages;

        return $this;
    }

    public function getDimensions(): ?int
    {
        return $this->dimensions;
    }

    public function setDimensions(int $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->original_language;
    }

    public function setOriginalLanguage(string $original_language): self
    {
        $this->original_language = $original_language;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAgeGroup(): ?AgeGroup
    {
        return $this->age_group;
    }

    public function setAgeGroup(?AgeGroup $age_group): self
    {
        $this->age_group = $age_group;

        return $this;
    }

    /**
     * @return Collection|BookPhoto[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(BookPhoto $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setBook($this);
        }

        return $this;
    }

    public function removePhoto(BookPhoto $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getBook() === $this) {
                $photo->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AdminComment[]
     */
    public function getAdminComments(): Collection
    {
        return $this->adminComments;
    }

    public function addAdminComment(AdminComment $adminComment): self
    {
        if (!$this->adminComments->contains($adminComment)) {
            $this->adminComments[] = $adminComment;
            $adminComment->setBook($this);
        }

        return $this;
    }

    public function removeAdminComment(AdminComment $adminComment): self
    {
        if ($this->adminComments->removeElement($adminComment)) {
            // set the owning side to null (unless already changed)
            if ($adminComment->getBook() === $this) {
                $adminComment->setBook(null);
            }
        }

        return $this;
    }

    public function getAdminComment(): ?AdminComment
    {
        return $this->admin_comment;
    }

    public function setAdminComment(?AdminComment $admin_comment): self
    {
        $this->admin_comment = $admin_comment;

        return $this;
    }

    public function getAdminNotation(): ?int
    {
        return $this->admin_notation;
    }

    public function setAdminNotation(?int $admin_notation): self
    {
        $this->admin_notation = $admin_notation;

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
            $customerComment->setBook($this);
        }

        return $this;
    }

    public function removeCustomerComment(CustomerComment $customerComment): self
    {
        if ($this->customerComments->removeElement($customerComment)) {
            // set the owning side to null (unless already changed)
            if ($customerComment->getBook() === $this) {
                $customerComment->setBook(null);
            }
        }

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
            $customerOrderBook->setBook($this);
        }

        return $this;
    }

    public function removeCustomerOrderBook(CustomerOrderBook $customerOrderBook): self
    {
        if ($this->customerOrderBooks->removeElement($customerOrderBook)) {
            // set the owning side to null (unless already changed)
            if ($customerOrderBook->getBook() === $this) {
                $customerOrderBook->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Author[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
            $author->addBook($this);
        }

        return $this;
    }

    public function removeAuthor(Author $author): self
    {
        if ($this->authors->removeElement($author)) {
            $author->removeBook($this);
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
            $customerNotation->setBook($this);
        }

        return $this;
    }

    public function removeCustomerNotation(CustomerNotation $customerNotation): self
    {
        if ($this->customerNotations->removeElement($customerNotation)) {
            // set the owning side to null (unless already changed)
            if ($customerNotation->getBook() === $this) {
                $customerNotation->setBook(null);
            }
        }

        return $this;
    }
}
