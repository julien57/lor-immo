<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Photo
 *
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{
    const TARGET_DIR_IMAGE = __DIR__.'/../../../web/agency/imgs/property';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Property
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Property", inversedBy="photos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $property;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Property
     */
    public function getProperty(): Property
    {
        return $this->property;
    }

    /**
     * @param Property $property
     * @return Photo
     */
    public function setProperty(Property $property): Photo
    {
        $this->property = $property;
        return $this;
    }
}
