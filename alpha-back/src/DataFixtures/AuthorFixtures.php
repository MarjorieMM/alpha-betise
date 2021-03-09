<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Author;
use App\DataFixtures\BookFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {  
        $authors = [
        ['firstname' => "Sébastien", 'lastname' => 'Pérez'],
        ['firstname' => "Benjamin", 'lastname' => 'Lacombe'],
        ['firstname' => "Suzanne", 'lastname' => 'Lang'],
        ['firstname' => "Max", 'lastname' => 'Lang'],
        ['firstname' => "Loic", 'lastname' => 'Jouannigot'],
        ['firstname' => "Philippe", 'lastname' => 'Jalbert'],
        ['firstname' => "Ryan T.", 'lastname' => 'Higgins']
        ];

foreach ($authors as $key => $value) {
    $author = new Author;
    $author->setLastname($value['lastname']);
    $author->setFirstname($value['firstname']);
    $manager->persist($author);

}
        $manager->flush();
    }

    
}