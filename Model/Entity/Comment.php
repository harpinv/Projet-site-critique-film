<?php

namespace App\Model\Entity;

class Comment
{
    private int $id;
    private string $name;
    private string $firstName;
    private string $text;
    private string $commentDate;
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
     * @return Comment
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Comment
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Comment
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
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
     * @return Comment
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDate(): string
    {
        return $this->commentDate;
    }

    /**
     * @param string $commentDate
     * @return Comment
     */
    public function setCommentDate(string $commentDate): self
    {
        $this->commentDate = $commentDate;
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
     * @return Comment
     */
    public function setFkMovies(int $fkMovies): self
    {
        $this->fkMovies = $fkMovies;
        return $this;
    }
}
