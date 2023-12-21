<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface //implemente l'interface de dependances
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setTitle('Âne en peluche');
        $product->setCategory($this->getReference('TOYS'));
        $product->setDescription('Joli âne en peluche gris, avec bouton audio');
        $product->setPrice(29.99);
        $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies() : array // retourne un tableau de dépendances
    {
        return [
            CategoryFixtures::class
        ];
    }
}
