<?php

namespace App\DataFixtures;

use App\Entity\Product;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $product1 = new Product;
        $product1->setName('Miel de foret')
            ->setDescription('Un miel de qualité superieure')
            ->setImage('miel1.jpg')
            ->setPrice(12.99)
            ->setCreatedAt(new \DateTime());
        $manager->persist($product1);

        $product2 = new Product;
        $product2->setName('Miel de foret')
            ->setDescription('Un miel de qualité superieure')
            ->setImage('miel2.jpg')
            ->setPrice(12.99)
            ->setCreatedAt(new \DateTime());
        $manager->persist($product2);

        $product3 = new Product;
        $product3->setName('Miel de foret')
            ->setDescription('Un miel de qualité superieure')
            ->setImage('miel3.jpg')
            ->setPrice(20.99)
            ->setCreatedAt(new \DateTime());
        $manager->persist($product3);

        $product4 = new Product;
        $product4->setName('Miel de foret')
            ->setDescription('Un miel de qualité superieure')
            ->setImage('miel4.png')
            ->setPrice(10.99)
            ->setCreatedAt(new \DateTime());
        $manager->persist($product4);


        $manager->flush();
    }
}
