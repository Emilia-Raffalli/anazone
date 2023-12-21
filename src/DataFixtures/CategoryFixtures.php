<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class CategoryFixtures extends Fixture
{
    Public const CATAGORY_VOYAGES = 'CATEGORY_VOYAGES';
    public const CATEGORY_TOYS = 'CATEGORY_TOYS';
    public const CATEGORY_AVEC_UN_ANE = 'AVEC_UN_ANE';
    public const CATEGORY_SHOES = 'SHOES';

    public function load(ObjectManager $manager): void
    {
        $travels = new Category();
        $travels->setName('VOYAGES');
        $manager->persist($travels);
        $this->addReference(self::CATAGORY_VOYAGES, $travels);


        $donkeys = new Category();
        $donkeys->setName('AVEC UN ÂNE');
        $donkeys->setParentCategory($travels);
        $manager->persist($donkeys);
        $this->addReference(self::CATEGORY_AVEC_UN_ANE, $donkeys);


        $toys = new Category();
        $toys->setName('JOUETS');
        $manager->persist($toys); // traite l'entité
        $this->addReference(self::CATEGORY_TOYS, $toys);


        $shoes = new Category();
        $shoes->setName('CHAUSSURES');
        $manager->persist($shoes);
        $this->addReference(self::CATEGORY_SHOES, $shoes);


        $manager->flush(); // met à jour ou insère dans la base
    }
}
