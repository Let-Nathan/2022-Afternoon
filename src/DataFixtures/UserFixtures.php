<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private const USER = [
        'user1' => [
            'Bordeaux',
            'Fred',
            'Doe',
            '06-15-10-20-58',
            'freddoe@gmail.com',
            'CapG',
            'azerty'
        ],
        'user2' => [
            'Angers',
            'Cathy',
            'Clavier',
            '+33-6-67-58-25',
            'cathy@gmail.com',
            'Schneider',
            'azerty'
        ],
        'user3' => [
            'Paris',
            'Marc',
            'hozier',
            '0624553843',
            'marc@gmail.com',
            'MagSolution',
            'azerty'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::USER as $value) {
            $user = new User();
            $user->setCity($this->getReference('city_' . $value[0]));
            $user->setFirstName($value[1]);
            $user->setLastName($value[2]);
            $user->setPhone($value[3]);
            $user->setEmail($value[4]);
            $user->setCompagny($value[5]);
            $user->setPassword($value[6]);
            $manager->persist($user);
            $this->addReference('user_' . $value[1], $user);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CityFixtures::class,
        ];
    }
}
