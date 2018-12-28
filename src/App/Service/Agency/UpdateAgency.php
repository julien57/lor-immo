<?php

namespace App\Service\Agency;

use App\Entity\Agency;
use App\Model\AgencyDTO;
use App\Service\File\UniqueFileName;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UpdateAgency
{
    use UniqueFileName;

    public function update(AgencyDTO $agencyDTO, Agency $agency)
    {
        $agency->setDescription($agencyDTO->getDescription());
        $agency->setAddress($agencyDTO->getAddress());
        $agency->setPostcode($agencyDTO->getPostcode());
        $agency->setCity($agencyDTO->getCity());
        $agency->setPhone($agencyDTO->getPhone());
        $agency->setEmail($agencyDTO->getEmail());
        $agency->setWebsite($agencyDTO->getWebsite());

        if ($agencyDTO->getImage()) {
            $file = $agencyDTO->getImage();
            $filename = strtolower($agency->getName()).'-'.$this->generateUniqueFileName().'.'.$file->guessExtension();

            try {
                $file->move(
                    Agency::TARGET_DIR_IMAGE,
                    $filename
                );

                $agency->setImage($filename);

            } catch (FileException $e) {
                throw new FileException($e);
            }
        }

        return $agency;
    }
}