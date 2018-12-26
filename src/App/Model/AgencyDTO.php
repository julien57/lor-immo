<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class AgencyDTO
{
    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $postcode;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var File|null
     */
    private $image;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     *
     * @Assert\Email(message="L'adresse mail '{{ value }}' n'est pas valide.")
     */
    private $email;

    /**
     * @var string|null
     *
     * @Assert\Url(message="Le site '{{ value }}' n'est pas une URL valable.")
     */
    private $website;

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return null|string
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param null|string $postcode
     */
    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
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
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return null|File
     */
    public function getImage(): ?File
    {
        return $this->image;
    }

    /**
     * @param null|File $image
     */
    public function setImage(?File $image): void
    {
        $this->image = $image;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
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
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param null|string $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }
}
