<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFEFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $pfe = new PFE();
            $pfe->setTitle($faker->title);
            $pfe->setStudent($faker->Name);

            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
