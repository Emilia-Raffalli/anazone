<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $travels = new Category();
        $travels->setName('Voyages');
        $manager->persist($travels);

        $donkeys = new Category();
        $donkeys->setName('Avec un âne');
        $donkeys->setParentCategory($travels);
        $manager->persist($donkeys);

        $toys = new Category();
        $toys->setName('Jouets');
        $manager->persist($toys); // traite l'entité
        $this->addReference('TOYS', $toys);

        $manager->flush(); // met à jour ou insère dans la base
    }
}
