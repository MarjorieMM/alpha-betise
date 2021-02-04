<?php

namespace App\Entity;

use App\Repository\AdminCommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminCommentRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="adminComments")
     */
    private $admin;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="adminComments")
     */
    private $book;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity=Book::class, mappedBy="admin_comment", cascade={"persist", "remove"})
     */
    private $book_comment_admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
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

    public function getBookCommentAdmin(): ?Book
    {
        return $this->book_comment_admin;
    }

    public function setBookCommentAdmin(?Book $book_comment_admin): self
    {
        // unset the owning side of the relation if necessary
        if ($book_comment_admin === null && $this->book_comment_admin !== null) {
            $this->book_comment_admin->setAdminComment(null);
        }

        // set the owning side of the relation if necessary
        if ($book_comment_admin !== null && $book_comment_admin->getAdminComment() !== $this) {
            $book_comment_admin->setAdminComment($this);
        }

        $this->book_comment_admin = $book_comment_admin;

        return $this;
    }
}
