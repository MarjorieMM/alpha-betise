<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CustomerFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');
        $customers = [];
        $genders = ['male', 'female'];

        for ($i = 0; $i <= 20; ++$i) {
            $customer = new Customer();
            $gender = $faker->randomElement($genders);
            $firstname = $faker->firstname($gender);
            $lastname = $faker->lastName;
            $email = $faker->email;
            $hash = $this->encoder->encodePassword($customer, 'password');
            $address = $faker->streetAddress;
            $city = $faker->city;
            $customer->setLastname($lastname)
            ->setFirstname($firstname)
            ->setEmail($email)
            ->setPassword($hash)
            ->setAge(rand(0, 18))
            ->setAddress($address)
            ->setPostalCode(rand(01000, 98999))
            ->setCity($city)
            ->setNewsletter(rand(0, 1));
            $manager->persist($customer);
            $customers[] = $customer;
        }


        $manager->flush();
    }

    
}