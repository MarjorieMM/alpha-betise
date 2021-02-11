<?php

namespace App\DataFixtures;

use App\Entity\Venue;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;


class VenueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {  
        $venues = ["Libriarie Alpha-Bêtise", "Salle Jean Garnier", "Librairie de quartier", "Salle de la Mairie", "Salle Jean Cocteau"];
        $faker = Factory::create('fr_FR');

for ($i=0; $i < count($venues); $i++) { 
 $venue = new Venue();
 $address = $faker->streetAddress;
 $city = $faker->city;

 $venue->setName($venues[$i])
 ->setAddress($address)
 ->setPostalCode(rand(14000, 14200))
 ->setCity($city);
$manager->persist($venue);
}        
        $manager->flush();
    }

    
}