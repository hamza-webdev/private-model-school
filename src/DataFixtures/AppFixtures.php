<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Eleve;
use App\Entity\Tuteur;
use App\Entity\Student;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10 ; $i++) {

            $tuteur = new tuteur();


                $tuteur->setNameFather($faker->name())->setNameMather($faker->name())
                ->setCity($faker->city())->setAdresse($faker->address())->setEmail($faker->email())
                ->setTelephoneFather($faker->phoneNumber())->setTelephoneMother($faker->phoneNumber())
                ->setPassword($faker->password())
                ;
                $r = $faker->numberBetween(0, 2);
                for ($j=0; $j <= $r  ; $j++) {
            $eleve = (new Eleve())
                            ->setName($faker->name())
                            ->setGendre($faker->randomElement(['Masculin', 'Femenin']))
                            ->setInfoPerso($faker->sentence())
                            ->setDateInscriptionAt($faker->dateTimeInInterval('-10 week', '+1 days'))
                            ->setDateNaissanceAt($faker->dateTimeBetween('-13 year', '-5 year'));

            $student = (new Student())
                            ->setName($faker->name())
                            ->setSurname($faker->userName())
                            ->setSexe($faker->randomElement(['Masculin', 'Femenin']))
                            ->setInfoPerso($faker->sentence())
                            ->setDateInscrit($faker->dateTimeInInterval('-10 week', '+1 days'))
                            ->setDateNaissance($faker->dateTimeBetween('-13 year', '-5 year'));

            $eleves[] = $eleve;
            $tuteur->addEleve($eleve);
            $tuteur->addStudent($student);
            $manager->persist($eleve);
            $manager->persist($student);
            }





            // $manager->persist($eleve);



            $manager->persist($tuteur);

        }

        $manager->flush();
    }
}
