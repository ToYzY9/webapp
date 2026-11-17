<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\User;
use Faker;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création de l'objet Faker
        $faker = Faker\Factory::create('fr_FR');
        $categories = [];
        for ($i = 0; $i < 20; $i++) {
            //Créer des objets
            $category = new Category();
            $category->setName(ucfirst($faker->unique()->word()));
            // persister l'objet
            $manager->persist($category);
            $categories[] = $category;
        }
            $users = [];
        for ($i = 0; $i < 10; $i++) {
            //Créer des objets
            $user = new User();
            $user->setEmail($faker->unique()->email());
            $user->setPassword(password_hash($faker->password(8,35), PASSWORD_DEFAULT));
            $user->setFirstname(ucfirst($faker->firstName('male'|'female')));
            $user->setLastname(ucfirst($faker->lastName()));
            // persister l'objet
            $manager->persist($user);
            $users[] = $user;
        }

        for ($i = 0; $i < 60; $i++) {
            //Créer des objets
            $book = new Book();
            $book->setTitle(ucfirst($faker->sentence(2)));
            $book->setResume($faker->sentence(3));
            $book->setPublishAt(new \DateTimeImmutable($faker->date('d-m-Y')));
            $book->setAuthor(ucfirst($faker->lastName()) ." ". ucfirst($faker->firstName('male'|'female')));
            for ($j = 0; $j < 5; $j++) {
                $book->addCategory($faker->randomElement($categories));
            }
            $book->setUserName($faker->randomElement($users));
            // persister l'objet
            $manager->persist($book);
        }

        // Envoyer et exécuter la requète insert
        $manager->flush();
    }
}
