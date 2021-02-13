<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminCommentRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AdminCommentRepository::class)
 *  @ApiResource
 */
class AdminComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups("books")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("books")
     */
    private $created_at;

    /**
     * @ORM\OneToOne(targetEntity=Book::class, inversedBy="adminComment", cascade={"persist", "remove"})
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="admin_comment")
     */
    private $book_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getBookName(): ?Book
    {
        return $this->book_name;
    }

    public function setBookName(?Book $book_name): self
    {
        $this->book_name = $book_name;

        return $this;
    }
}