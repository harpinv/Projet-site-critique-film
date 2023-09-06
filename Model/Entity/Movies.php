<?php

namespace App\Model\Entity;

class movies
{
    private int $id;
    private string $title;
    private string $releaseYear;
    private string $country;
    private string $director;
    private string $writer;
    private string $actor;
    private string $genre;
    private string $poster;
    private string $oscarWinners;
    private string $goldenPalmWinners;
    private string $greatestMovies;
    private string $afiLists;
    private string $rating;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return movies
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
     * @return movies
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseYear(): string
    {
        return $this->releaseYear;
    }

    /**
     * @param string $releaseYear
     * @return movies
     */
    public function setReleaseYear(string $releaseYear): self
    {
        $this->releaseYear = $releaseYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return movies
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * @param string $director
     * @return movies
     */
    public function setDirector(string $director): self
    {
        $this->director = $director;
        return $this;
    }

    /**
     * @return string
     */
    public function getWriter(): string
    {
        return $this->writer;
    }

    /**
     * @param string $writer
     * @return movies
     */
    public function setWriter(string $writer): self
    {
        $this->writer = $writer;
        return $this;
    }

    /**
     * @return string
     */
    public function getActor(): string
    {
        return $this->actor;
    }

    /**
     * @param string $actor
     * @return movies
     */
    public function setActor(string $actor): self
    {
        $this->actor = $actor;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     * @return movies
     */
    public function setGenre(string $genre): self
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     * @return movies
     */
    public function setPoster(string $poster): self
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @return string
     */
    public function getOscarWinners(): string
    {
        return $this->oscarWinners;
    }

    /**
     * @param string $oscarWinners
     * @return movies
     */
    public function setOscarWinners(string $oscarWinners): self
    {
        $this->oscarWinners = $oscarWinners;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoldenPalmWinners(): string
    {
        return $this->goldenPalmWinners;
    }

    /**
     * @param string $goldenPalmWinners
     * @return movies
     */
    public function setGoldenPalmWinners(string $goldenPalmWinners): self
    {
        $this->goldenPalmWinners = $goldenPalmWinners;
        return $this;
    }

    /**
     * @return string
     */
    public function getGreatestMovies(): string
    {
        return $this->greatestMovies;
    }

    /**
     * @param string $greatestMovies
     * @return movies
     */
    public function setGreatestMovies(string $greatestMovies): self
    {
        $this->greatestMovies = $greatestMovies;
        return $this;
    }

    /**
     * @return string
     */
    public function getAfiLists(): string
    {
        return $this->afiLists;
    }

    /**
     * @param string $afiLists
     * @return movies
     */
    public function setAfiLists(string $afiLists): self
    {
        $this->afiLists = $afiLists;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return movies
     */
    public function setRating(string $rating): self
    {
        $this->rating = $rating;
        return $this;
    }
}