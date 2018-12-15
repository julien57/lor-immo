<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

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
            $agency->setName('Agency'.$i);
            $agency->setDescription($faker->text);
            $agency->setPhone('03'.$faker->randomNumber());
            $agency->setWebsite($faker->url);
            $agency->setAddress($faker->address);
            $agency->setPassword('Agency');

            $manager->persist($agency);
        }
        $manager->flush();
    }
}
