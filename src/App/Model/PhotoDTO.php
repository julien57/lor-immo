<?php

namespace App\Model;

class PhotoDTO
{
    /**
     * @var array|null
     */
    private $name;

    /**
     * @return array|null
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * @param array|null $name
     */
    public function setName(?array $name): void
    {
        $this->name = $name;
    }
}