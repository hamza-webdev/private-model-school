<?php

namespace App\DataFixtures;

use App\Entity\Student;
use DateTime;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('ar_EG');

        for ($i=0; $i < 10 ; $i++) {
            $user = new Student();
            $user->setName($faker->name())
            ->setSexe($faker->randomElement(['ذكر', 'أنثى']))
            ->setInfoPerso($faker->sentence())
            ->setDateInscrit($faker->dateTimeInInterval('-10 week', '+1 days'))
            ->setDateNaissance($faker->dateTimeBetween('-13 year', '-5 year'))
            ->setSurname($faker->firstName())
            ->setName($faker->lastName())
            ;

            $manager->persist($user);
        }

        $manager->flush();
    }
}
