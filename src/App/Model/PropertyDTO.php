<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PropertyDTO
{
    /**
     * @var string|null
     * @Assert\NotBlank(message="Veuillez ajouter un titre à l'annonce.")
     */
    private $title;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Veuillez ajouter une description à l'annonce.")
     */
    private $description;

    /**
     * @var int|null
     * @Assert\NotBlank(message="Veuillez entrez le nombre de pièces même si celui-ci est à 0.")
     * @Assert\Type(type="integer", message="Le nombre de pièces du bien doit être exprimée en chiffre.")
     */
    private $room;

    /**
     * @var int|null
     * @Assert\NotBlank(message="Veuillez entrez le nombre de chambres même si celui-ci est à 0.")
     * @Assert\Type(type="integer", message="Le nombre de chambres du bien doit être exprimée en chiffre.")
     */
    private $bedroom;

    /**
     * @var bool|null
     * @Assert\Type(type="bool")
     */
    private $garage;

    /**
     * @var string|null
     * @Assert\Type(type="string")
     */
    private $heater;

    /**
     * @var int|null
     * @Assert\NotBlank(message="Veuillez renseigner la surface du bien.")
     * @Assert\Type(type="integer", message="La surface du bien doit être exprimée en chiffre.")
     */
    private $area;

    /**
     * @var int|null
     * @Assert\NotBlank(message="Veuillez renseigner la surface du terrain/jardin.")
     * @Assert\Type(type="integer", message="La surface du jardin doit être exprimée en chiffres.")
     */
    private $garden;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Veuillez renseigner la commune où se trouve le bien.")
     * @Assert\Type(type="string", message="La commune du bien doit être écrite en lettres.")
     */
    private $city;

    /**
     * @var string|null
     */
    private $department;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Veuillez renseigner le prix du bien.")
     * @Assert\Type(type="string", message="Le prix du bien doit être exprimée en chiffre.")
     */
    private $price;

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

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
     * @return int|null
     */
    public function getRoom(): ?int
    {
        return $this->room;
    }

    /**
     * @param int|null $room
     */
    public function setRoom(?int $room): void
    {
        $this->room = $room;
    }

    /**
     * @return int|null
     */
    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    /**
     * @param int|null $bedroom
     */
    public function setBedroom(?int $bedroom): void
    {
        $this->bedroom = $bedroom;
    }

    /**
     * @return bool|null
     */
    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    /**
     * @param bool|null $garage
     */
    public function setGarage(?bool $garage): void
    {
        $this->garage = $garage;
    }

    /**
     * @return null|string
     */
    public function getHeater(): ?string
    {
        return $this->heater;
    }

    /**
     * @param null|string $heater
     */
    public function setHeater(?string $heater): void
    {
        $this->heater = $heater;
    }

    /**
     * @return int|null
     */
    public function getArea(): ?int
    {
        return $this->area;
    }

    /**
     * @param int|null $area
     */
    public function setArea(?int $area): void
    {
        $this->area = $area;
    }

    /**
     * @return int|null
     */
    public function getGarden(): ?int
    {
        return $this->garden;
    }

    /**
     * @param int|null $garden
     */
    public function setGarden(?int $garden): void
    {
        $this->garden = $garden;
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
     * @return null|string
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * @param null|string $department
     */
    public function setDepartment(?string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return null|string
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param null|string $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }
}
