<?php

namespace App\Service\File;

trait UniqueFileName
{
    /**
     * @return string
     */
    public function generateUniqueFileName(): string
    {
        return md5(uniqid());
    }
}