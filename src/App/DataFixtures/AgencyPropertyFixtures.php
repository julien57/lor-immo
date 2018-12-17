<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * This fixtures add agencies with properties.
 */
class AgencyPropertyFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Add a new agency with properties
        $agency = new Agency();
        $agency->setName('Agency1');
        $agency->setDescription($faker->text);
        $agency->setPhone('03'.$faker->randomNumber());
        $agency->setWebsite($faker->url);
        $agency->setAddress($faker->address);
        $agency->setPassword('Agency');

        $manager->persist($agency);

        for ($i = 1; $i <= 10; $i++) {

            $property = new Property();
            $property->setTitle($faker->company);
            $property->setDescription($faker->text);
            $property->setGarden($faker->numberBetween(0,500));
            $property->setGarage($faker->boolean);
            $property->setCity($faker->city);
            $property->setArea($faker->numberBetween(40, 130));
            $property->setBedroom($faker->numberBetween(1,5));
            $property->setHeater($faker->randomElement(['Gaz', 'Electrique', 'Fioul']));
            $property->setRoom($faker->numberBetween(2, 7));
            $property->setType($faker->randomElement(['Appartement', 'Maison', 'Terrain']));
            $property->setPrice($faker->numberBetween(40000, 350000));
            $property->setDepartment($faker->randomElement(['Moselle', 'Meurthe-et-Moselle', 'Vosges', 'Meuse']));
            $property->setAgency($agency);

            $manager->persist($property);
        }

        // Add a new agency with other other new properties
        $agency2 = new Agency();
        $agency2->setName('Agency2');
        $agency2->setDescription($faker->text);
        $agency2->setPhone('03'.$faker->randomNumber());
        $agency2->setWebsite($faker->url);
        $agency2->setAddress($faker->address);
        $agency2->setPassword('Agency');

        $manager->persist($agency2);

        for ($i = 1; $i <= 5; $i++) {

            $property2 = new Property();
            $property2->setTitle($faker->company);
            $property2->setDescription($faker->text);
            $property2->setGarden($faker->numberBetween(0,500));
            $property2->setGarage($faker->boolean);
            $property2->setCity($faker->city);
            $property2->setArea($faker->numberBetween(40, 130));
            $property2->setBedroom($faker->numberBetween(1,5));
            $property2->setHeater($faker->randomElement(['Gaz', 'Electrique', 'Fioul']));
            $property2->setRoom($faker->numberBetween(2, 7));
            $property2->setType($faker->randomElement(['Appartement', 'Maison', 'Terrain']));
            $property2->setPrice($faker->numberBetween(40000, 350000));
            $property2->setDepartment($faker->randomElement(['Moselle', 'Meurthe-et-Moselle', 'Vosges', 'Meuse']));
            $property2->setAgency($agency2);

            $manager->persist($property2);
        }

        // Add a new agency with other new properties
        $agency3 = new Agency();
        $agency3->setName('Agency3');
        $agency3->setDescription($faker->text);
        $agency3->setPhone('03'.$faker->randomNumber());
        $agency3->setWebsite($faker->url);
        $agency3->setAddress($faker->address);
        $agency3->setPassword('Agency');

        $manager->persist($agency3);

        for ($i = 1; $i <= 8; $i++) {

            $property3 = new Property();
            $property3->setTitle($faker->company);
            $property3->setDescription($faker->text);
            $property3->setGarden($faker->numberBetween(0,500));
            $property3->setGarage($faker->boolean);
            $property3->setCity($faker->city);
            $property3->setArea($faker->numberBetween(40, 130));
            $property3->setBedroom($faker->numberBetween(1,5));
            $property3->setHeater($faker->randomElement(['Gaz', 'Electrique', 'Fioul']));
            $property3->setRoom($faker->numberBetween(2, 7));
            $property3->setType($faker->randomElement(['Appartement', 'Maison', 'Terrain']));
            $property3->setPrice($faker->numberBetween(40000, 350000));
            $property3->setDepartment($faker->randomElement(['Moselle', 'Meurthe-et-Moselle', 'Vosges', 'Meuse']));
            $property3->setAgency($agency3);

            $manager->persist($property3);
        }
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            AgencyFixtures::class
        ];
    }
}
