<?php

namespace App\DataFixtures;

use App\Entity\Consultation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ConsultationFixtures extends Fixture implements DependentFixtureInterface
{
    private const CONSULTATION = [
        'candidate1' => [
            'Fred',
            'Refused',
        ],
        'candidate2' => [
            'Cathy',
            'Accepted'
        ],
        'candidate3' => [
            'Marc',
            'Job Interview'

        ]
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        foreach (self::CONSULTATION as $key => $value) {
            $consultation = new Consultation();
            $consultation->setUser($this->getReference('user_' . $value[0]));
            $consultation->setCandidate($this->getReference('user_' . $key));
            $consultation->setCreatedAt($faker->dateTimeBetween('-1 week', '+1 week'));
            $consultation->setRelanceDate($faker->dateTimeBetween('+4 week', '+6 week'));
            $consultation->setStatus($value[1]);
            $manager->persist($consultation);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CandidateFixtures::class,
        ];
    }
}
