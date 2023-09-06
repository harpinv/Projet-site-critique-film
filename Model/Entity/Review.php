<?php

namespace App\Model\Entity;

class review
{
    private int $id;
    private string $title;
    private string $text;
    private string $author;
    private string $reviewDate;
    private int $fkMovies;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return review
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return review
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return review
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return review
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getReviewDate(): string
    {
        return $this->reviewDate;
    }

    /**
     * @param string $reviewDate
     * @return review
     */
    public function setReviewDate(string $reviewDate): self
    {
        $this->reviewDate = $reviewDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getFkMovies(): int
    {
        return $this->fkMovies;
    }

    /**
     * @param int $fkMovies
     * @return review
     */
    public function setFkMovies(int $fkMovies): self
    {
        $this->fkMovies = $fkMovies;
        return $this;
    }
}
