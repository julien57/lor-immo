<?php

namespace App\Model;

class EditPropertyDTO
{
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var int|null
     */
    private $room;

    /**
     * @var int|null
     */
    private $bedroom;

    /**
     * @var bool|null
     */
    private $garage;

    /**
     * @var string|null
     */
    private $heater;

    /**
     * @var int|null
     */
    private $garden;

    /**
     * @var string|null
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