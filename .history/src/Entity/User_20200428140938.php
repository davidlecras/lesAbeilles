<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message="Vous êtes déjà chez nous"
 * )
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *  min = 5,
     *  max = 100,
     *  minMessage = "Votre nom d'utilisateur doit faire au minimum {{ limit }} caractères",
     *  maxMessage = "Votre nom d'utilisateur doit faire au maximum {{ limit }} caractères",
     *  allowEmptyString = false
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *  message = "l'email '{{ value }}' n'est pas valide."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *  min = 5,
     *  max = 20,
     *  minMessage = "Votre mot de passe doit faire au minimum {{ limit }} caractères",
     *  maxMessage = "Votre mot de passe doit faire au maximum {{ limit }} caractères",
     *  allowEmptyString = false
     * )
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passe ne sont pas identiques")
     * @Assert\Length(
     *  min = 5,
     *  max = 20,
     *  minMessage = "Votre mot de passe doit faire au minimum {{ limit }} caractères",
     *  maxMessage = "Votre mot de passe doit faire au maximum {{ limit }} caractères",
     *  allowEmptyString = false
     * )
     */
    private $verifPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $HasAcceptedThermsAndConditions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return [$this->roles];
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function getVerifPassword(): ?string
    {
        return $this->verifPassword;
    }

    public function setVerifPassword(string $verifPassword): self
    {
        $this->verifPassword = $verifPassword;

        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
    }

    public function getHasAcceptedThermsAndConditions(): ?bool
    {
        return $this->HasAcceptedThermsAndConditions;
    }

    public function setHasAcceptedThermsAndConditions(?bool $HasAcceptedThermsAndConditions): self
    {
        $this->HasAcceptedThermsAndConditions = $HasAcceptedThermsAndConditions;

        return $this;
    }
}
