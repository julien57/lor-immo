<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * This fictures add new agencies without properties
 */
class AgencyFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

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
            $agency->setEmail($faker->email);
            $agency->setPassword($this->encoder->encodePassword($agency, 'Agency'));

            $manager->persist($agency);
        }
        $manager->flush();
    }
}
