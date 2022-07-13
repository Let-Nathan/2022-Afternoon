<?php

namespace App\DataFixtures;

use App\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CandidateFixtures extends Fixture implements DependentFixtureInterface
{
    private const CANDIDATE = [
        "candidate1" => [
            "https://cdn-images.zety.fr/pages/cv_developpeur_web_zety_fr_4.jpg",
            "linkedin.com/jane",
            true,
            false,
            'JavaScript',
            '25k',
            'Fred',
            'Node Js',
            'One years',
            'Now',
            'Front-End',

        ],
        "candidate2" => [
            "https://cdn-images.zety.fr/pages/cv_developpeur_web_zety_fr_4.jpg",
            "linkedin.com/jane",
            true,
            false,
            'Symfony',
            '35k',
            'Cathy',
            'Php 7/8',
            'More than five years',
            'After three month',
            'Analyst'
        ],
        "candidate3" => [
            "https://cdn-images.zety.fr/pages/cv_developpeur_web_zety_fr_4.jpg",
            "linkedin.com/jane",
            true,
            false,
            'Python',
            '50k',
            'Marc',
            'Go',
            'Three years',
            'Three month',
            'Data-scientist'

        ],

    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        foreach (self::CANDIDATE as $key => $value) {
            $candidate = new Candidate();
            $candidate->setCuriculumVitae($value[0]);
            $candidate->setFirstName($faker->firstName);
            $candidate->setLastName($faker->lastName);
            $candidate->setCity($faker->city);
            $candidate->setPhone($faker->phoneNumber);
            $candidate->setEmail($faker->email);
            $candidate->setLinkedin($value[1]);
            $candidate->setTelework($faker->boolean);
            $candidate->setVehicle($faker->boolean);
            $candidate->setSalary($value[5]);
            $candidate->setValidateSheet($faker->boolean);
            $candidate->setCreatedAt($faker->dateTimeBetween('-4 week', '+4 week'));
            $candidate->setArchived(false);
            $candidate->setIsVisible(true);
            $candidate->setGender($faker->boolean);
            $candidate->setExpirationDate($faker->dateTimeThisYear('+4 months'));
            $candidate->setUser($this->getReference('user_' . $value[6]));
            $candidate->addSkills($this->getReference('skill_' . $value[7]));
            $candidate->addDomains($this->getReference('domain_' . $value[4]));
            $candidate->setExperience($this->getReference('name_' . $value[8]));
            $candidate->addDisponibilities($this->getReference('disponibility_' . $value[9]));
            $candidate->setBusinessRole($this->getReference('business_role_' . $value[10]));
            $this->addReference('user_' . $key, $candidate);
            $manager->persist($candidate);
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            SkillAndStuffFixtures::class,
            XPFixtures::class,
            BusinessRoleFixtures::class,

        ];
    }
}
