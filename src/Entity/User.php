<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $newsCountry;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $newsCategory = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $weatherLocation = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $icalURLs = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $lineFollowed = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNewsCountry(): ?string
    {
        return $this->newsCountry;
    }

    public function setNewsCountry(?string $newsCountry): self
    {
        $this->newsCountry = $newsCountry;

        return $this;
    }

    public function getNewsCategory(): ?array
    {
        return $this->newsCategory;
    }

    public function setNewsCategory(?array $newsCategory): self
    {
        $this->newsCategory = $newsCategory;

        return $this;
    }

    public function getWeatherLocation(): ?array
    {
        return $this->weatherLocation;
    }

    public function setWeatherLocation(?array $weatherLocation): self
    {
        $this->weatherLocation = $weatherLocation;

        return $this;
    }

    public function getIcalURLs(): ?array
    {
        return $this->icalURLs;
    }

    public function setIcalURLs(?array $icalURLs): self
    {
        $this->icalURLs = $icalURLs;

        return $this;
    }

    public function getLineFollowed(): ?array
    {
        return $this->lineFollowed;
    }

    public function setLineFollowed(?array $lineFollowed): self
    {
        $this->lineFollowed = $lineFollowed;

        return $this;
    }
}