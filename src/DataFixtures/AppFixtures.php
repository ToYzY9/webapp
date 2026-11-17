<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création de l'objet Faker
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 7; $i++) {
            //Créer des objets
            $category = new Category();
            $category->setName($faker->word());
            // persister l'objet
            $manager->persist($category);
        }

        // Envoyer et exécuter la requète insert
        $manager->flush();
    }
}
