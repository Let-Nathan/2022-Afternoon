<?php

namespace App\DataFixtures;

use App\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CandidateFixtures extends Fixture implements DependentFixtureInterface
{
    private const candidate = [
        "candidate_1" => [
            "0688889999",
            "monmail@gmail.com",
            "linkedin.com/john",
            true,
            true,
            "35K€",
            true,
            "Bonne capacité d'adaptation",
            05-06-2022,
            false,
            true,
            true,
            05-12-2022,
            15,
            "3 ans",
            "Symfony",
            "PHP",
            "1050€",
            "3 mois",
            "Dev",
            "Bordeaux",
            1
        ],
        "candidate_2" => [
        ],
        "candidate_3" => [
            "0611112222",
            "testmail@gmail.com",
            "linkedin.com/jane",
            true,
            false,
            "25K€",
            true,
            "",
            22-01-2022,
            false,
            true,
            false,
            22-07-2022,
            22,
            "aucune",
            "React",
            "JS",
            "750€",
            "Tout de suite",
            "Dev",
            "Bordeaux",
            1
        ],
        "candidate_4" => [
        ],
        "candidate_5" => [
        ]

    ];

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        foreach (self::candidate as $value) {
            $candidate = new Candidate();
            $candidate->setCuriculumVitae($faker->image);
            $candidate->setFirstName($faker->firstName);
            $candidate->setLastName($faker->lastName);
            $candidate->setPhone($value[0]);
            $candidate->setEmail($value[1]);
            $candidate->setCity($faker->city);
            $candidate->setLinkedin($value[2]);
            $candidate->setTelework($value[3]);
            $candidate->setVehicle($value[4]);
            $candidate->setSalary($value[5]);
            $candidate->setValidateSheet($value[6]);
            $candidate->setObservation($value[7]);
            $candidate->setCreatedAt($value[8]);
            $candidate->setArchived($value[9]);
            $candidate->setIsVisible($value[10]);
            $candidate->setGender($value[11]);
            $candidate->setExpirationDate($value[12]);
            $candidate->setUser($value[13]);
            $candidate->setExperience($value[14]);
            $candidate->addSkills($value[15]);
            $candidate->addDomains($value[16]);
            $candidate->setPrime($value[17]);
            $candidate->addDisponibilities($value[18]);
            $candidate->setBusinessRole($value[19]);
            $candidate->addMobilities($value[20]);
            $candidate->setValidatedBy($value[21]);


            $manager->persist($candidate);
        }
        $manager->flush();
    }

    public function getDependencies() {
        return null;
    }

}
