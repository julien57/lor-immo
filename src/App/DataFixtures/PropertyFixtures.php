<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Fixtures add properties by agencies in DB.
 * If command doctrine:fixtures:load failed verify the id of agencies in your DB.
 */
class PropertyFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
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

            $manager->persist($property);
        }

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

            $manager->persist($property2);
        }

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
