<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationDTO
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     * @Assert\Length(min=6, minMessage="Le mot de passe doit être composé de 6 caractères minimum.")
     */
    private $password;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     *
     * @return RegistrationDTO
     */
    public function setName(?string $name): RegistrationDTO
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     *
     * @return RegistrationDTO
     */
    public function setCity(?string $city): RegistrationDTO
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     *
     * @return RegistrationDTO
     */
    public function setEmail(?string $email): RegistrationDTO
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     *
     * @return RegistrationDTO
     */
    public function setPassword(?string $password): RegistrationDTO
    {
        $this->password = $password;

        return $this;
    }
}
