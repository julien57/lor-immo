<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * This fictures add new agencies without properties
 */
class AgencyFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 3; $i++) {
            $agency = new Agency();
            $agency->setName($faker->company);
            $agency->setDescription($faker->text);
            $agency->setPhone('03'.$faker->randomNumber());
            $agency->setWebsite($faker->url);
            $agency->setAddress($faker->streetAddress);
            $agency->setPostcode(54000);
            $agency->setCity($faker->city);
            $agency->setPassword('Agency');

            $manager->persist($agency);
        }
        $manager->flush();
    }
}
