<?php

namespace App\Model\Entity;

class User
{
    private int $id;
    private string $name;
    private string $firstName;
    private string $email;
    private string $identify;
    private string $password;
    private string $role;
    private int $confirm;

    /**
     * Encode password.
     * @param $password
     * @return string
     */
    public function encodePassword(string $password): string {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
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
     * @return User
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentify(): string
    {
        return $this->identify;
    }

    /**
     * @param string $identify
     * @return User
     */
    public function setIdentify(string $identify): self
    {
        $this->identify = $identify;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $this->encodePassword($password);
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return int
     */
    public function getConfirm(): int
    {
        return $this->confirm;
    }

    /**
     * @param int $confirm
     * @return User
     */
    public function setConfirm(int $confirm): self
    {
        $this->confirm = $confirm;
        return $this;
    }
}
