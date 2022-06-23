<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

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
            $hashedPassword = $this->passwordHasher->hashPassword($admin, $value[3]);
            $admin->setPassword($hashedPassword);
            $admin->setEmail($value[4]);
            $admin->setRole($value[5]);
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
