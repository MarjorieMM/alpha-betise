<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 *  @ApiResource
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("books")
     */
    private $extract;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $editor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $cover_photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("books")
     */
    private $photo_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("books")
     */
    private $photo_2;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $publishing_house;

    /**
     * @ORM\Column(type="date")
     * @Groups("books")
     */
    private $publication_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $collection;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $EAN_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $ISBN_code;

    /**
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $number_pages;

    /**
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $dimension_h;

    /**
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $dimension_w;

    /**
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("books")
     */
    private $original_language;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     * @Groups("books")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class, mappedBy="books", cascade={"persist"},)
     *  @Groups("books")
     */
    private $authors;

    /**
     * @ORM\ManyToOne(targetEntity=Availability::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=true)
     * @Groups("books")
     */
    private $availability;

    /**
     * @ORM\ManyToOne(targetEntity=AgeGroup::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=true)
     * @Groups("books")
     */
    private $ageGroup;

    /**
     * @ORM\ManyToMany(targetEntity=Order::class, mappedBy="books")
    
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity=OrderBook::class, mappedBy="book")
     */
    private $orderBooks;

    /**
     * @ORM\OneToOne(targetEntity=AdminComment::class, mappedBy="book", cascade={"persist", "remove"})
     * @Groups("books")
     */
    private $adminComment;

    /**
     * @ORM\OneToMany(targetEntity=AdminComment::class, mappedBy="book_name")
     */
    private $admin_comment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("books")
     */
    private $admin_notation;

    /**
     * @ORM\OneToMany(targetEntity=CustomerComment::class, mappedBy="book")
     * @Groups("books")
     */
    private $customer_comment;

    /**
     * @ORM\OneToMany(targetEntity=CustomerNotation::class, mappedBy="book", orphanRemoval=true)
     * @Groups("books")
     */
    private $customer_notation;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->orderBooks = new ArrayCollection();
        $this->admin_comment = new ArrayCollection();
        $this->customer_comment = new ArrayCollection();
        $this->customer_notation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
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

    public function getCoverPhoto(): ?string
    {
        return $this->cover_photo;
    }

    public function setCoverPhoto(string $cover_photo): self
    {
        $this->cover_photo = $cover_photo;

        return $this;
    }

    public function getPhoto1(): ?string
    {
        return $this->photo_1;
    }

    public function setPhoto1(?string $photo_1): self
    {
        $this->photo_1 = $photo_1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo_2;
    }

    public function setPhoto2(?string $photo_2): self
    {
        $this->photo_2 = $photo_2;

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

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): self
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

    public function getDimensionH(): ?int
    {
        return $this->dimension_h;
    }

    public function setDimensionH(int $dimension_h): self
    {
        $this->dimension_h = $dimension_h;

        return $this;
    }

    public function getDimensionW(): ?int
    {
        return $this->dimension_w;
    }

    public function setDimensionW(int $dimension_w): self
    {
        $this->dimension_w = $dimension_w;

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

    public function getAvailability(): ?Availability
    {
        return $this->availability;
    }

    public function setAvailability(?Availability $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getAgeGroup(): ?AgeGroup
    {
        return $this->ageGroup;
    }

    public function setAgeGroup(?AgeGroup $ageGroup): self
    {
        $this->ageGroup = $ageGroup;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    // public function addOrder(Order $order): self
    // {
    //     if (!$this->orders->contains($order)) {
    //         $this->orders[] = $order;
    //         $order->addBook($this);
    //     }

    //     return $this;
    // }

    // public function removeOrder(Order $order): self
    // {
    //     if ($this->orders->removeElement($order)) {
    //         $order->removeBook($this);
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|OrderBook[]
     */
    public function getOrderBooks(): Collection
    {
        return $this->orderBooks;
    }

    public function addOrderBook(OrderBook $orderBook): self
    {
        if (!$this->orderBooks->contains($orderBook)) {
            $this->orderBooks[] = $orderBook;
            $orderBook->setBook($this);
        }

        return $this;
    }

    public function removeOrderBook(OrderBook $orderBook): self
    {
        if ($this->orderBooks->removeElement($orderBook)) {
            // set the owning side to null (unless already changed)
            if ($orderBook->getBook() === $this) {
                $orderBook->setBook(null);
            }
        }

        return $this;
    }

    public function getAdminComment(): ?AdminComment
    {
        return $this->adminComment;
    }

    public function setAdminComment(?AdminComment $adminComment): self
    {
        // unset the owning side of the relation if necessary
        if ($adminComment === null && $this->adminComment !== null) {
            $this->adminComment->setBook(null);
        }

        // set the owning side of the relation if necessary
        if ($adminComment !== null && $adminComment->getBook() !== $this) {
            $adminComment->setBook($this);
        }

        $this->adminComment = $adminComment;

        return $this;
    }

    public function addAdminComment(AdminComment $adminComment): self
    {
        if (!$this->admin_comment->contains($adminComment)) {
            $this->admin_comment[] = $adminComment;
            $adminComment->setBookName($this);
        }

        return $this;
    }

    public function removeAdminComment(AdminComment $adminComment): self
    {
        if ($this->admin_comment->removeElement($adminComment)) {
            // set the owning side to null (unless already changed)
            if ($adminComment->getBookName() === $this) {
                $adminComment->setBookName(null);
            }
        }

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
    public function getCustomerComment(): Collection
    {
        return $this->customer_comment;
    }

    public function addCustomerComment(CustomerComment $customerComment): self
    {
        if (!$this->customer_comment->contains($customerComment)) {
            $this->customer_comment[] = $customerComment;
            $customerComment->setBook($this);
        }

        return $this;
    }

    public function removeCustomerComment(CustomerComment $customerComment): self
    {
        if ($this->customer_comment->removeElement($customerComment)) {
            // set the owning side to null (unless already changed)
            if ($customerComment->getBook() === $this) {
                $customerComment->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CustomerNotation[]
     */
    public function getCustomerNotation(): Collection
    {
        return $this->customer_notation;
    }

    public function addCustomerNotation(CustomerNotation $customerNotation): self
    {
        if (!$this->customer_notation->contains($customerNotation)) {
            $this->customer_notation[] = $customerNotation;
            $customerNotation->setBook($this);
        }

        return $this;
    }

    public function removeCustomerNotation(CustomerNotation $customerNotation): self
    {
        if ($this->customer_notation->removeElement($customerNotation)) {
            // set the owning side to null (unless already changed)
            if ($customerNotation->getBook() === $this) {
                $customerNotation->setBook(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}