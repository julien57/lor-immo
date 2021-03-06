<?php

namespace App\Entity;

use App\Model\PropertyDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 *
 * @ORM\Table(name="property")
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="room", type="integer")
     */
    private $room;

    /**
     * @var int
     *
     * @ORM\Column(name="bedroom", type="integer")
     */
    private $bedroom;

    /**
     * @var bool
     *
     * @ORM\Column(name="garage", type="boolean")
     */
    private $garage;

    /**
     * @var string
     *
     * @ORM\Column(name="heater", type="string", length=255)
     */
    private $heater;

    /**
     * @var int
     *
     * @ORM\Column(name="area", type="integer")
     */
    private $area;

    /**
     * @var int
     *
     * @ORM\Column(name="garden", type="integer")
     */
    private $garden;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var Agency
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Agency")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agency;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     *
     * @return Property
     */
    public function setTitle(string $title): Property
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Property
     */
    public function setDescription(string $description): Property
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getRoom(): int
    {
        return $this->room;
    }

    /**
     * @param int $room
     *
     * @return Property
     */
    public function setRoom(int $room): Property
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return int
     */
    public function getBedroom(): int
    {
        return $this->bedroom;
    }

    /**
     * @param int $bedroom
     *
     * @return Property
     */
    public function setBedroom(int $bedroom): Property
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    /**
     * @return bool
     */
    public function isGarage(): bool
    {
        return $this->garage;
    }

    /**
     * @param bool $garage
     *
     * @return Property
     */
    public function setGarage(bool $garage): Property
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * @return string
     */
    public function getHeater(): string
    {
        return $this->heater;
    }

    /**
     * @param string $heater
     *
     * @return Property
     */
    public function setHeater(string $heater): Property
    {
        $this->heater = $heater;

        return $this;
    }

    /**
     * @return int
     */
    public function getArea(): int
    {
        return $this->area;
    }

    /**
     * @param int $area
     *
     * @return Property
     */
    public function setArea(int $area): Property
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return int
     */
    public function getGarden(): int
    {
        return $this->garden;
    }

    /**
     * @param int $garden
     *
     * @return Property
     */
    public function setGarden(int $garden): Property
    {
        $this->garden = $garden;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Property
     */
    public function setCity(string $city): Property
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     *
     * @return Property
     */
    public function setDepartment(string $department): Property
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Property
     */
    public function setType(string $type): Property
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     *
     * @return Property
     */
    public function setPrice(int $price): Property
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Agency
     */
    public function getAgency(): Agency
    {
        return $this->agency;
    }

    /**
     * @param Agency $agency
     */
    public function setAgency(Agency $agency): void
    {
        $this->agency = $agency;
    }

    public static function initAgency(PropertyDTO $propertyDTO, Agency $agency)
    {
        $property = new self();

        $property->title = $propertyDTO->getTitle();
        $property->description = $propertyDTO->getDescription();
        $property->room = $propertyDTO->getBedroom();
        $property->bedroom = $propertyDTO->getBedroom();
        $property->garage = $propertyDTO->getGarage();
        $property->garden = $propertyDTO->getGarden();
        $property->heater = $propertyDTO->getHeater();
        $property->area = $propertyDTO->getArea();
        $property->city = $propertyDTO->getCity();
        $property->department = $propertyDTO->getDepartment();
        $property->type = $propertyDTO->getType();
        $property->price = $propertyDTO->getPrice();
        $property->agency = $agency;

        return $property;
    }
}
