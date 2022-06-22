<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    private const ADMIN = [
        'admin' => [
            'John',
            'Doe',
            'Thales',
            'azerty',
            'admin@gmail.com',
            'ROLE_ADMIN'
        ],
        'superAdmin' => [
            'François',
            'Mirande',
            'AfterNoon',
            'azerty',
            'superadmin@gmail.com',
            'ROLE_SUPERADMIN'
        ]
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::ADMIN as $value) {
            $admin = new Admin();
            $admin->setFirstName($value[0]);
            $admin->setLastName($value[1]);
            $admin->setCompagny($value[2]);
            $admin->setPassword($value[3]);
            $admin->setEmail($value[4]);
            $admin->setRole($value[5]);
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
